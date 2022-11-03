<?php
// Sessão
session_start();
if(isset($_SESSION['mensagem'])){ ?>

<!-- templete para mostrar mensagem de erro -->
<script>
    window.onload = function() {
        M.toast({html: "<?php echo $_SESSION['mensagem']; ?>"});
    };
</script>

<?php }
session_unset();
?>