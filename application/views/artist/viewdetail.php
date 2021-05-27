<div class="song-layout">
    <div class="left-column">
        <?php
        $count = 0;
        $imgPath = BASE_PATH . "/public/assets/img/" . $artist['Artist']['avatar']
        ?>
        <h2>List of songs</h2>

        <?php if (!empty($artist['Song'])) : ?>
                <?php foreach ($artist['Song'] as $element) : ?>
                    <?php
                    $count++;
                    $song_path = BASE_PATH . "/song/viewdetail/" . $element['Song']['id'] . "/" . strtolower(str_replace(" ", "-", $element['Song']['name']));
                    ?>
                    <li class="item">
                        <div class="song-info">
                            <a class="song-name" href=<?= $song_path ?>> <?= $element['Song']['name'] ?> </a>
                        </div>
                    </li>
                <?php endforeach; ?>
        <?php else : ?>
            <div>Have no song in database</div>
        <?php endif ?>

    </div>
    <div class="right-column">
        <div class="song-image-big" style="background-image: url(<?php echo $imgPath ?>)">
        </div>
        <h1><?php echo $artist['Artist']['name'] ?></h1>
        <p> <?php echo $artist['Country']['name'] ?></p>
        <p>Age: <?php echo $artist['Artist']['age'] ?></p>
    </div>