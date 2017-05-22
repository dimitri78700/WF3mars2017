<?php
    require_once('inc/init.inc.php');

    require_once('inc/header.inc.php');

?>


<form method="post" action="">
    
    <label for="tarif">Tarif</label><br>
    <input size="16" type="text" value="2012-06-15 14:45" readonly class="form_datetime">
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
    </script>

    <label for="tarif">Tarif</label><br>
    <input size="16" type="text" value="2012-06-15 14:45" readonly class="form_datetime">
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
    </script>

    <select name="salle" id="salle"><br>
        <?php 
        foreach ($categorie as $value) {
            echo '<p>'.$value['id_produit'].'</p>';
        } 
        ?>
    </select><br><br>

    <label for="tarif">Tarif</label><br>
    <input type="number" name="tarif" id="tarif" placeholder="prix en euro">

    <input type="submit" value="Enregistrer">

</form>


<?php
    require_once('inc/footer.inc.php');


?>