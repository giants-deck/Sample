<?php


namespace Core\Elements;


class Elements
{
    public function topElements(){?>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <?php }

    public function bottomElements(){?>
        <script src="../assets/js/jQuery.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/scripts.js"></script>
    <?php }


    public function generatePepper($length = 10){
        $characters = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ`~!@#$%^&*()_+';
        $charactersLenght = strlen($characters);
        $randomPepper = '';

        for ($i = 0; $i < $length; $i++){
            $randomPepper .= $characters[rand(0, $charactersLenght - 1)];
        }

        return $randomPepper;
    }

    public function toast($message, $verify){

        $cssToast = '';

        if ($verify == 0){
            $cssToast = 'successToast';
        }

        if ($verify == 1){
            $cssToast = 'errorToast';
        }

        if ($verify == 2){
            $cssToast = 'warnToast';
        }

        ?>
        <div class="toast col-lg-12" id="<?php echo $cssToast;?>">

            <div class="toast-body" id="toastBody">
                <div class="row" id="figureToast">
                    <div class="col-lg-11"><?php echo $message;?></div>
                    <button class="close col-1" id="close" data-dismiss="toast"><span class="float-lg-right">&times;</span></button>
                </div>
            </div>

        </div>
    <?php ;}
}