<h1>Edit User</h1>

<?php include_partial('form', array('form' => $form)) ?>
<?php
$tmpServers = array();
foreach ($user_servers as $serv){
    $tmpServers[] = $serv->getServerId();
}
?>
<h1>Access Info</h1>
<form action="<?php echo url_for('user/updateServer?id='.$form->getObject()->getId()) ?>" method="post" enctype="multipart/form-data" >
    <table>
        <tr>
            <td>
                <select multiple="multiple" id="sel1" name="server_no[]">
                    <?php foreach( $servers as $server): ?>
                    <option value="<?php echo $server->getId(); ?>" <?php if(in_array($server->getId(),$tmpServers)) echo 'selected="selected"' ?>>
                        <?php echo $server->getName(); ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </td>

        </tr>
        <tr>
            <td><input type="submit" value="Ok"><input type="hidden" name="ef" value="re" /> </td>
        </tr>
    </table>
</form>