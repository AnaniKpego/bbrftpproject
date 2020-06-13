<?php


namespace App\Service;


use App\Entity\Image;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class UploadImage
{
    private $imageDir;
    private $projectDir;
    private $manager;

    public function __construct(string $projectDir, string $imageDir, EntityManagerInterface $manager)
    {
        $this->projectDir = $projectDir;
        $this->imageDir = $imageDir;
        $this->manager = $manager;
    }

    public function uploadFromBase64($name, $dataUrl)
    {
        if (!empty($name) && !empty($dataUrl)) {
            $pos = strrpos($name, "/");
            if ($pos !== false) {
                $name = mb_substr($name, $pos + 1);
            }
            if (str_contains($dataUrl, 'data:image/png;base64,') === false) {
                return false;
            } else {
                $img = str_replace('data:image/png;base64,', '', $dataUrl);
                $img = str_replace(' ', '+', $img);
                $img = base64_decode($img);

                $i = 1;
                $nb = 0;
                $pos = strrpos($name, ".");
                $nName = mb_substr($name, 0, $pos);
                $ext = mb_substr($name, $pos);


                try {
                    $image = file_get_contents($this->projectDir . "/public$this->imageDir$nName$ext");

                    if ($image === false) {
                        dd("Il y'a eu une erreur");
                    } else {
                        $name = $nName . hrtime(true) . $ext;
                    }
                } catch (Exception $e) {

                }

                file_put_contents("$this->projectDir/public/$this->imageDir$name", $img);
                return "$this->imageDir$name";
            }
        }
        return false;
    }

    public function persistImage(Image $image)
    {
        if ($image->getId() === null) {
            $path = $this->uploadFromBase64($image->getPath(), $image->getDataUrl());
            if ($path !== false) {
                $image->setPath($path);
            } else {
                $image->setRoom(null);
            }
        } else {
            $fromDB = $this->manager->getRepository(Image::class)->find($image->getId());

            if ($fromDB !== null) {
                if ($fromDB->getPath() !== $image->getPath()) {
                    $path = $this->uploadFromBase64($image->getPath(), $image->getDataUrl());
                    if ($path !== false) {
                        $image->setPath($path);
                    } else {
                        $image->setRoom(null);
                    }
                }
            }
        }
        $this->manager->persist($image);
    }
}
