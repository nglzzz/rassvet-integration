<?php
class Router
{
    private $pages = [];

    function addRoute($url, $path)
    {
        $this->pages[$url] = $path;
    }

    function route($url)
    {
        $path = $this->pages[$url];

        if ($path == '') {
            echo 'Error! The path is empty!';
            die();
        }

        $file_dir = $path;

        if (file_exists($file_dir)) {
            require $file_dir;
            die();
        } else {
            echo 'Error! No file exists!';
            die();
        }
    }

    function setEnvData(string $filePath = '')
    {
        if (empty($filePath)) {
            $filePath = '.env';
        }
        if (!file_exists($filePath)) {
            throw new RuntimeException('Wrong file path.');
        }
        $file = file_get_contents($filePath);
        $data = array_filter(explode(PHP_EOL, $file));
        if (empty($data)) {
            return;
        }
        foreach ($data as $i => $line) {
            $data[$i] = array_map('trim', explode('=', $line, 2));
            if (isset($data[$i][1])) {
                $data[$i][1] = trim($data[$i][1], '"');
            } else {
                $data[$i][1] = '';
            }
            $_ENV[$data[$i][0]] = $data[$i][1];
        }
    }
}
