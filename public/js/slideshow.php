<style>
    .slideshow-container {
        display: flex;
        justify-content: space-between;
    }

    .slideshow-cell {
        width: 30vw;
        vertical-align: top;
    }

    .fadein {
        position: relative;
        height: 300px;
        width: 100%;
        margin: 0;
        overflow: hidden;
        background: #ebebeb;
        border-radius: 10px;
    }

    .fadein img {
        position: absolute;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
    $(function () {
        function animateSlideshows(slideshowSelector) {
            $(slideshowSelector + ' .fadein img:gt(0)').hide();
            setInterval(function () {
                $(slideshowSelector + ' .fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo(slideshowSelector + ' .fadein');
            }, 3000);
        }

        <?php
        $folders = [
            "../resources/slideshow/1",
            "../resources/slideshow/2",
            "../resources/slideshow/3"
        ];

        for ($i = 0; $i < 3; $i++):
        $dir = $folders[$i];
        ?>
        setTimeout(function () {
            animateSlideshows('.slideshow-cell:nth-child(<?php echo $i + 1; ?>)');
        }, <?php echo $i * 5000; ?>);
        <?php endfor; ?>
    });
</script>

<div id="my_slideshow" class="slideshow-container" style="padding: 20px">
    <?php

    for ($i = 0; $i < 3; $i++):
        $dir = $folders[$i];
        ?>
        <div class="slideshow-cell">
            <div class="fadein">
                <?php
                $scan_dir = scandir($dir);
                foreach($scan_dir as $img):
                    if(in_array($img, array('.', '..')))
                        continue;
                    ?>
                    <img src="<?php echo $dir.'/'.$img ?>" alt="<?php echo $img ?>">
                <?php endforeach; ?>
            </div>
        </div>
    <?php endfor; ?>
</div>