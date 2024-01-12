<?php
require __DIR__ . '/../src/bootstrap.php';

?>
<?php view('header', ['title' => 'Login']) ?>


    <style>

        article {
            margin-bottom: 40px;
            background-color: rgba(159, 169, 163, 0.4);
            padding: 15px;
            border-radius: 8px;
            color: black;
            margin-right: auto;
            margin-left: auto;
            max-width: 800px; /* Set your desired maximum width */
            line-height: 1.6; /* Increase line height for better readability */
        }

        p {
            padding: 10px;
        }

        h2 {
            padding: 10px;
        }
    </style>

    <article>
        <h2>Blog Post Title 1</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales elementum finibus. Vestibulum et
            magna et orci vestibulum pulvinar. Aliquam vitae condimentum justo, eget accumsan ex. Sed ut maximus odio.
            Aenean nunc eros, vehicula in volutpat rutrum, sodales eu odio. In ipsum nulla, vestibulum ut eleifend sit
            amet, vulputate ac libero. Praesent tincidunt, purus ut dapibus feugiat, tellus magna varius odio, ac
            malesuada nisl lectus blandit ipsum. Suspendisse euismod, nisi in sollicitudin finibus, quam ante luctus
            neque, a malesuada magna turpis vitae arcu. Pellentesque facilisis tellus vel pulvinar vehicula. In vitae
            elit euismod, molestie nisi in, dictum turpis. Sed ut ante neque.

        <p>Nam quis consectetur orci. Nullam mollis varius eros, quis tempus leo euismod eu. Curabitur nibh tortor,
            tincidunt ut congue vitae, pellentesque ac tortor. Praesent sagittis neque a facilisis porttitor. Praesent
            ac risus condimentum, mattis velit vitae, eleifend lorem. Sed ipsum lorem, consequat vel libero et, rhoncus
            laoreet eros. Fusce vitae ipsum libero. Fusce blandit est eu elit bibendum, vitae pellentesque eros euismod.
            Fusce aliquam congue sapien nec fermentum. Pellentesque non consectetur elit, malesuada dapibus purus.
            Maecenas malesuada in metus nec porttitor. Quisque luctus sem eget tortor vehicula, a luctus nunc pretium.
            Aliquam elit metus, ultrices dictum sapien sodales, auctor faucibus quam.
        </p>
        <p>In lorem est, molestie ut dignissim quis, blandit finibus nulla. Ut eget semper metus. Sed ullamcorper orci
            sit amet aliquet vulputate. Pellentesque vel consequat nisl. Nulla tristique libero eu massa dignissim, sed
            finibus quam auctor. Cras gravida varius est, in tempus sapien mollis sit amet. Curabitur a neque euismod,
            mattis eros ac, aliquam mauris. Suspendisse quis nulla auctor, efficitur mi eget, porttitor lectus.
            Phasellus ultricies metus turpis, quis convallis risus dignissim sed.

        </p> Mauris eu est sit amet lacus vehicula gravida. Donec rutrum ligula sed dictum lacinia. Aliquam id fermentum
        enim. Etiam luctus ultricies dictum. In convallis dignissim mauris, eget luctus dui facilisis nec. Sed pulvinar
        eu nulla eu pulvinar. Praesent augue est, rutrum faucibus tristique non, ornare sit amet turpis. Sed laoreet vel
        nisl quis dictum.

        Nulla sollicitudin vehicula neque, nec sagittis augue tempor eget. Sed rutrum pulvinar magna a commodo. Etiam mi
        neque, interdum vel fringilla vitae, ornare quis diam. Proin consequat id ex eget convallis. Sed varius laoreet
        lacus, sed dignissim diam semper in. Curabitur pretium velit erat, non lobortis arcu aliquam eget. Duis interdum
        eros id imperdiet ornare. Donec blandit ex nec ligula vestibulum placerat.</p>
    </article>

    <article>
        <h2>Blog Post Title 2</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales elementum finibus. Vestibulum et
            magna et orci vestibulum pulvinar. Aliquam vitae condimentum justo, eget accumsan ex. Sed ut maximus odio.
            Aenean nunc eros, vehicula in volutpat rutrum, sodales eu odio. In ipsum nulla, vestibulum ut eleifend sit
            amet, vulputate ac libero. Praesent tincidunt, purus ut dapibus feugiat, tellus magna varius odio, ac
            malesuada nisl lectus blandit ipsum. Suspendisse euismod, nisi in sollicitudin finibus, quam ante luctus
            neque, a malesuada magna turpis vitae arcu. Pellentesque facilisis tellus vel pulvinar vehicula. In vitae
            elit euismod, molestie nisi in, dictum turpis. Sed ut ante neque.

        <p>Nam quis consectetur orci. Nullam mollis varius eros, quis tempus leo euismod eu. Curabitur nibh tortor,
            tincidunt ut congue vitae, pellentesque ac tortor. Praesent sagittis neque a facilisis porttitor. Praesent
            ac risus condimentum, mattis velit vitae, eleifend lorem. Sed ipsum lorem, consequat vel libero et, rhoncus
            laoreet eros. Fusce vitae ipsum libero. Fusce blandit est eu elit bibendum, vitae pellentesque eros euismod.
            Fusce aliquam congue sapien nec fermentum. Pellentesque non consectetur elit, malesuada dapibus purus.
            Maecenas malesuada in metus nec porttitor. Quisque luctus sem eget tortor vehicula, a luctus nunc pretium.
            Aliquam elit metus, ultrices dictum sapien sodales, auctor faucibus quam.
        </p>
        <p>In lorem est, molestie ut dignissim quis, blandit finibus nulla. Ut eget semper metus. Sed ullamcorper orci
            sit amet aliquet vulputate. Pellentesque vel consequat nisl. Nulla tristique libero eu massa dignissim, sed
            finibus quam auctor. Cras gravida varius est, in tempus sapien mollis sit amet. Curabitur a neque euismod,
            mattis eros ac, aliquam mauris. Suspendisse quis nulla auctor, efficitur mi eget, porttitor lectus.
            Phasellus ultricies metus turpis, quis convallis risus dignissim sed.

        </p> Mauris eu est sit amet lacus vehicula gravida. Donec rutrum ligula sed dictum lacinia. Aliquam id fermentum
        enim. Etiam luctus ultricies dictum. In convallis dignissim mauris, eget luctus dui facilisis nec. Sed pulvinar
        eu nulla eu pulvinar. Praesent augue est, rutrum faucibus tristique non, ornare sit amet turpis. Sed laoreet vel
        nisl quis dictum.

        Nulla sollicitudin vehicula neque, nec sagittis augue tempor eget. Sed rutrum pulvinar magna a commodo. Etiam mi
        neque, interdum vel fringilla vitae, ornare quis diam. Proin consequat id ex eget convallis. Sed varius laoreet
        lacus, sed dignissim diam semper in. Curabitur pretium velit erat, non lobortis arcu aliquam eget. Duis interdum
        eros id imperdiet ornare. Donec blandit ex nec ligula vestibulum placerat.</p>
    </article>

    <article>
        <h2>Blog Post Title 3</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales elementum finibus. Vestibulum et
            magna et orci vestibulum pulvinar. Aliquam vitae condimentum justo, eget accumsan ex. Sed ut maximus odio.
            Aenean nunc eros, vehicula in volutpat rutrum, sodales eu odio. In ipsum nulla, vestibulum ut eleifend sit
            amet, vulputate ac libero. Praesent tincidunt, purus ut dapibus feugiat, tellus magna varius odio, ac
            malesuada nisl lectus blandit ipsum. Suspendisse euismod, nisi in sollicitudin finibus, quam ante luctus
            neque, a malesuada magna turpis vitae arcu. Pellentesque facilisis tellus vel pulvinar vehicula. In vitae
            elit euismod, molestie nisi in, dictum turpis. Sed ut ante neque.

        <p>Nam quis consectetur orci. Nullam mollis varius eros, quis tempus leo euismod eu. Curabitur nibh tortor,
            tincidunt ut congue vitae, pellentesque ac tortor. Praesent sagittis neque a facilisis porttitor. Praesent
            ac risus condimentum, mattis velit vitae, eleifend lorem. Sed ipsum lorem, consequat vel libero et, rhoncus
            laoreet eros. Fusce vitae ipsum libero. Fusce blandit est eu elit bibendum, vitae pellentesque eros euismod.
            Fusce aliquam congue sapien nec fermentum. Pellentesque non consectetur elit, malesuada dapibus purus.
            Maecenas malesuada in metus nec porttitor. Quisque luctus sem eget tortor vehicula, a luctus nunc pretium.
            Aliquam elit metus, ultrices dictum sapien sodales, auctor faucibus quam.
        </p>
        <p>In lorem est, molestie ut dignissim quis, blandit finibus nulla. Ut eget semper metus. Sed ullamcorper orci
            sit amet aliquet vulputate. Pellentesque vel consequat nisl. Nulla tristique libero eu massa dignissim, sed
            finibus quam auctor. Cras gravida varius est, in tempus sapien mollis sit amet. Curabitur a neque euismod,
            mattis eros ac, aliquam mauris. Suspendisse quis nulla auctor, efficitur mi eget, porttitor lectus.
            Phasellus ultricies metus turpis, quis convallis risus dignissim sed.

        </p> Mauris eu est sit amet lacus vehicula gravida. Donec rutrum ligula sed dictum lacinia. Aliquam id fermentum
        enim. Etiam luctus ultricies dictum. In convallis dignissim mauris, eget luctus dui facilisis nec. Sed pulvinar
        eu nulla eu pulvinar. Praesent augue est, rutrum faucibus tristique non, ornare sit amet turpis. Sed laoreet vel
        nisl quis dictum.

        Nulla sollicitudin vehicula neque, nec sagittis augue tempor eget. Sed rutrum pulvinar magna a commodo. Etiam mi
        neque, interdum vel fringilla vitae, ornare quis diam. Proin consequat id ex eget convallis. Sed varius laoreet
        lacus, sed dignissim diam semper in. Curabitur pretium velit erat, non lobortis arcu aliquam eget. Duis interdum
        eros id imperdiet ornare. Donec blandit ex nec ligula vestibulum placerat.</p>
    </article>

    <article>
        <h2>Blog Post Title 4</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales elementum finibus. Vestibulum et
            magna et orci vestibulum pulvinar. Aliquam vitae condimentum justo, eget accumsan ex. Sed ut maximus odio.
            Aenean nunc eros, vehicula in volutpat rutrum, sodales eu odio. In ipsum nulla, vestibulum ut eleifend sit
            amet, vulputate ac libero. Praesent tincidunt, purus ut dapibus feugiat, tellus magna varius odio, ac
            malesuada nisl lectus blandit ipsum. Suspendisse euismod, nisi in sollicitudin finibus, quam ante luctus
            neque, a malesuada magna turpis vitae arcu. Pellentesque facilisis tellus vel pulvinar vehicula. In vitae
            elit euismod, molestie nisi in, dictum turpis. Sed ut ante neque.

        <p>Nam quis consectetur orci. Nullam mollis varius eros, quis tempus leo euismod eu. Curabitur nibh tortor,
            tincidunt ut congue vitae, pellentesque ac tortor. Praesent sagittis neque a facilisis porttitor. Praesent
            ac risus condimentum, mattis velit vitae, eleifend lorem. Sed ipsum lorem, consequat vel libero et, rhoncus
            laoreet eros. Fusce vitae ipsum libero. Fusce blandit est eu elit bibendum, vitae pellentesque eros euismod.
            Fusce aliquam congue sapien nec fermentum. Pellentesque non consectetur elit, malesuada dapibus purus.
            Maecenas malesuada in metus nec porttitor. Quisque luctus sem eget tortor vehicula, a luctus nunc pretium.
            Aliquam elit metus, ultrices dictum sapien sodales, auctor faucibus quam.
        </p>
        <p>In lorem est, molestie ut dignissim quis, blandit finibus nulla. Ut eget semper metus. Sed ullamcorper orci
            sit amet aliquet vulputate. Pellentesque vel consequat nisl. Nulla tristique libero eu massa dignissim, sed
            finibus quam auctor. Cras gravida varius est, in tempus sapien mollis sit amet. Curabitur a neque euismod,
            mattis eros ac, aliquam mauris. Suspendisse quis nulla auctor, efficitur mi eget, porttitor lectus.
            Phasellus ultricies metus turpis, quis convallis risus dignissim sed.

        </p> Mauris eu est sit amet lacus vehicula gravida. Donec rutrum ligula sed dictum lacinia. Aliquam id fermentum
        enim. Etiam luctus ultricies dictum. In convallis dignissim mauris, eget luctus dui facilisis nec. Sed pulvinar
        eu nulla eu pulvinar. Praesent augue est, rutrum faucibus tristique non, ornare sit amet turpis. Sed laoreet vel
        nisl quis dictum.

        Nulla sollicitudin vehicula neque, nec sagittis augue tempor eget. Sed rutrum pulvinar magna a commodo. Etiam mi
        neque, interdum vel fringilla vitae, ornare quis diam. Proin consequat id ex eget convallis. Sed varius laoreet
        lacus, sed dignissim diam semper in. Curabitur pretium velit erat, non lobortis arcu aliquam eget. Duis interdum
        eros id imperdiet ornare. Donec blandit ex nec ligula vestibulum placerat.</p>
    </article>

    <article>
        <h2>Blog Post Title 5</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales elementum finibus. Vestibulum et
            magna et orci vestibulum pulvinar. Aliquam vitae condimentum justo, eget accumsan ex. Sed ut maximus odio.
            Aenean nunc eros, vehicula in volutpat rutrum, sodales eu odio. In ipsum nulla, vestibulum ut eleifend sit
            amet, vulputate ac libero. Praesent tincidunt, purus ut dapibus feugiat, tellus magna varius odio, ac
            malesuada nisl lectus blandit ipsum. Suspendisse euismod, nisi in sollicitudin finibus, quam ante luctus
            neque, a malesuada magna turpis vitae arcu. Pellentesque facilisis tellus vel pulvinar vehicula. In vitae
            elit euismod, molestie nisi in, dictum turpis. Sed ut ante neque.

        <p>Nam quis consectetur orci. Nullam mollis varius eros, quis tempus leo euismod eu. Curabitur nibh tortor,
            tincidunt ut congue vitae, pellentesque ac tortor. Praesent sagittis neque a facilisis porttitor. Praesent
            ac risus condimentum, mattis velit vitae, eleifend lorem. Sed ipsum lorem, consequat vel libero et, rhoncus
            laoreet eros. Fusce vitae ipsum libero. Fusce blandit est eu elit bibendum, vitae pellentesque eros euismod.
            Fusce aliquam congue sapien nec fermentum. Pellentesque non consectetur elit, malesuada dapibus purus.
            Maecenas malesuada in metus nec porttitor. Quisque luctus sem eget tortor vehicula, a luctus nunc pretium.
            Aliquam elit metus, ultrices dictum sapien sodales, auctor faucibus quam.
        </p>
        <p>In lorem est, molestie ut dignissim quis, blandit finibus nulla. Ut eget semper metus. Sed ullamcorper orci
            sit amet aliquet vulputate. Pellentesque vel consequat nisl. Nulla tristique libero eu massa dignissim, sed
            finibus quam auctor. Cras gravida varius est, in tempus sapien mollis sit amet. Curabitur a neque euismod,
            mattis eros ac, aliquam mauris. Suspendisse quis nulla auctor, efficitur mi eget, porttitor lectus.
            Phasellus ultricies metus turpis, quis convallis risus dignissim sed.

        </p> Mauris eu est sit amet lacus vehicula gravida. Donec rutrum ligula sed dictum lacinia. Aliquam id fermentum
        enim. Etiam luctus ultricies dictum. In convallis dignissim mauris, eget luctus dui facilisis nec. Sed pulvinar
        eu nulla eu pulvinar. Praesent augue est, rutrum faucibus tristique non, ornare sit amet turpis. Sed laoreet vel
        nisl quis dictum.

        Nulla sollicitudin vehicula neque, nec sagittis augue tempor eget. Sed rutrum pulvinar magna a commodo. Etiam mi
        neque, interdum vel fringilla vitae, ornare quis diam. Proin consequat id ex eget convallis. Sed varius laoreet
        lacus, sed dignissim diam semper in. Curabitur pretium velit erat, non lobortis arcu aliquam eget. Duis interdum
        eros id imperdiet ornare. Donec blandit ex nec ligula vestibulum placerat. </p>
    </article>
<?php view('footer') ?>