<?php
resource: imagegrabscreen ( void );
$im = imagegrabscreen();
imagepng($im, "mi_captura_de_pantalla.png");
echo "".$im;
imagedestroy($im);
?>