<?php

namespace App\Entity;

class Production
{
    private ?int $id = null;
    private string $title = '';
    private string $description = '';
    private ?Studio $studio = null;
    private Genre $genre;
    private ?int $episodes = null;
    private int $currentEpisodes = 0;
    private string $trailerLink = '';
    private int $avaregeScore = 0;
//    private ?User $user = null;
}
