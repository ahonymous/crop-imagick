## Dependencies

1. Install [ImageMagick](http://imagemagick.org)
2. Install php5-imagick extension


## Install

1. composer require ahonymous/crop-imagick-bundle
2. add bundle to the kernel
3. config

> crop_imagick:
>     cache_path: "cache"
>     sizes:
>         - { name: "trumbnail500x500", width: 500, height: 500 }
>         - { name: "trumbnail500x300", width: 500, height: 300 }
>         - { name: "trumbnail300x500", width: 300, height: 500 }


## Use

### In controllers or services

> ...
> $this->get('crop_imagick.imagick_service')->thumbnail($path);
> ...

### In Twig

> {{ asset(image|crop_imagick('trumbnail300x500')) }}"
