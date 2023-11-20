<?php

namespace App\Models;


class Post_
{
    private static $blog_posts = [
        [
            "title" => "Judul Tulisan Pertama",
            "author" => "Sandika Galih",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint aliquid asperiores quia repellat reprehenderit sapiente fugit natus qui? Doloremque perferendis magnam nihil temporibus! Dolore est eligendi sapiente itaque, beatae provident inventore dicta distinctio nesciunt nisi a quae quidem laboriosam. Cumque porro nulla non asperiores quae expedita vel, aperiam, consequuntur facilis fuga sint magni fugit quam aliquam voluptatum, necessitatibus harum dolore reiciendis nobis dolores? Qui totam, eius, possimus accusantium soluta minima maxime rem, aspernatur molestias placeat dolore culpa provident in consequatur suscipit! Sed rerum amet voluptatibus quis, magnam est sapiente laborum, nihil, aut repellendus ducimus assumenda repellat. Laboriosam, consectetur quos. Iste?",
            "slug" => "Judul-Post-Pertama",
        ],
        [ 
            "title" => "Judul Tulisan Kedua",
            "author" => "Keenan Rahmanda",
            "slug" => "Judul-Post-Kedua",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sint aliquid asperiores quia repellat reprehenderit sapiente fugit natus qui? Doloremque perferendis magnam nihil temporibus! Dolore est eligendi sapiente itaque, beatae provident inventore dicta distinctio nesciunt nisi a quae quidem laboriosam. Cumque porro nulla non asperiores quae expedita vel, aperiam, consequuntur facilis fuga sint magni fugit quam aliquam voluptatum, necessitatibus harum dolore reiciendis nobis dolores? Qui totam, eius, possimus accusantium soluta minima maxime rem, aspernatur molestias placeat dolore culpa provident in consequatur suscipit! Sed rerum amet voluptatibus quis, magnam est sapiente laborum, nihil, aut repellendus ducimus assumenda repellat. Laboriosam, consectetur quos. Iste? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores delectus libero quidem iure nihil optio molestiae. Explicabo magnam voluptate similique nobis earum quasi, a minima quibusdam hic dicta asperiores inventore.",
        ]  
    ];

    public static function all() 
    {
        return collect (self::$blog_posts);

    }
    public static function find($slug)
    {
        $posts = static::all();
        return $posts ->firstWhere('slug', $slug);
    }
     
}