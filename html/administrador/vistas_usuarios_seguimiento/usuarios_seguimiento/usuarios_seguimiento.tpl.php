
<?php
$this->display("html/layouts/admin_header.tpl.php");
?>



<div class="formulario_crear">

    <div class="header_box"></div>
    <div class="body_box">

        <div class="inside">

            <h1>Administrador Consulta en Línea</h1>


            <div class="panel_admin">

                <div class="left_admin">


                    <?php
                    $this->display("html/layouts/admin_menu.tpl.php");
                    ?>



                </div>

                <div class="right_admin">


                    <div class="area_trabajo">




                        <div class="inside">


                            <?php
                            //if (($this->usuarios[0]["tipo_usuario_id"] == 2) || ($this->usuarios[0]["tipo_usuario_id"] == 3)) {
                                ?>

                                <div class="panel_usuarios">

                                    <h1>Usuarios de Seguimiento</h1>

                                    <p>
                                        Actualmente están registrados los siguientes usuarios:
                                    </p>

                                    <a href="<?=URL?>?page=administrador&action=usuario_seguimiento_nuevo&id=<?= $_GET["id"] ?>&username=<?= $this->usuarios[0]["email"] ?>" class="crear_usuario">Crear Usuario</a>


                                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">

                                        <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Email</th>
                                                <th>Nombre</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                            <?php
                                            $cont = 0;
                                            for ($i = 0; $i < count($this->usuarios_seguimiento); $i++) {
                                                $cont++;
                                                ?>
                                                <tr>
                                                    <td><?= $cont ?></td>
                                                    <td><?= $this->usuarios_seguimiento[$i]["email"] ?></td>
                                                    <td><?= $this->usuarios_seguimiento[$i]["nombre_completo"] ?></td>
                                                    <td> <a href="<?=URL?>?page=administrador&action=editar_usuario_seguimiento&id=<?= $this->usuarios_seguimiento[$i]["id"] ?>"><img src="<?=URL?>images/icon_edit.png" width="17" height="18" alt="Icon Edit"> </a> </td>

                                                    <td> <a href="<?=URL?>?page=administrador&action=eliminar_usuario_seguimiento&id=<?= $this->usuarios_seguimiento[$i]["id"] ?>" class="eliminar" title="¿Deseas borrar el registro?"><img src="<?=URL?>images/delete.png"></a> </td>

                                                </tr>
        <?
    }
    ?>



                                        </tbody>
                                    </table>

                                     <a href="<?=URL?>?page=administrador&action=editar_usuario_administrador"><img src="<?=URL?>images/icon_edit.png" width="17" height="18" alt="Icon Edit">Editar Usuario Administrador </a>





                                </div>


    <?php
//}
?>


                       










                        </div>




                    </div>

                </div>


            </div>

            <div class="clear"></div>

        </div>




    </div>


</div>
<div class="footer_box"></div>

</div>


<?php
$this->display("html/layouts/admin_footer.tpl.php");
?>