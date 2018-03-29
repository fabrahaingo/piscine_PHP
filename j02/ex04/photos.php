#!/usr/bin/php
<?php
    if ($argc == 2)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $argv[1]);
        curl_setopt($c, CURLOPT_HEADER, false);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        if ($str = curl_exec($c))
        {
            $contentType = curl_getinfo($c, CURLINFO_CONTENT_TYPE);
            if (!preg_match("/https?:\/\/([^\/]+)/", $argv[1], $f))
                return;
            echo $f[1] . "\n";
            if (!is_dir($f[1] . "/"))
                if (!mkdir($f[1] . "/"))
                    return;
            if (preg_match("/^image/", $contentType))
            {
                preg_match("/(?:.*\/)?([^?]*)/", $argv[1], $name);
                file_put_contents($f[1] . "/" . $name[1], $str);
                return;
            }
            preg_match_all("/<img .*?src=[\"']?([^ '\">]*)/", $str, $i);
            foreach ($i[1] as $link)
            {
                if (!preg_match("/^https?:\/\//", $link))
                {
                    if ($link[0] === '/' && $argv[1][strlen($argv[1]) - 1] !== '/')
                        $link = $argv[1] . $link;
                    elseif ($link[0] === '/' && $argv[1][strlen($argv[1]) - 1] === '/')
                        $link = $argv[1] . substr($link, 1);
                    elseif ($link[0] !== '/' && $argv[1][strlen($argv[1]) - 1] === '/')
                        $link = $argv[1] . $link;
                    elseif ($link[0] !== '/' && $argv[1][strlen($argv[1]) - 1] !== '/')
                        $link = $argv[1] . "/" . $link;
                }
                curl_setopt($c, CURLOPT_URL, $link);
                curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
                if ($img = curl_exec($c))
                {
                    preg_match("/(?:.*\/)?([^?]*)/", $link, $name);
                    file_put_contents($f[1] . "/" . $name[1], $img);
                }
            }
            curl_close($c);
        }
    }
?>
