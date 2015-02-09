<html>
<head>
    <title>My TinyMVC ToDo app</title>
</head>
<body>
<form action="" method="post" class="form-horizontal" role="form">
    <?php
    //als er op de knop update gedrukt werd voor een list item worden de waardes van het element hier ingevuld en kunnen ze aangepast worden
    if(isset($_POST['update'])){
        $form='<label for="description_in">Description :
        <input class="form-control" type="text" name="description_in" size="40" value="' . $_GET['description'] .'"/></label>
        <br>
        <label for="finished_in">Finished :
        <input type="checkbox" name="finished_in" '. (( $_GET['finished'] == 1) ? 'checked="checked"' : '') .' value="1" >
        <br>
        <input type="submit" name="do_update" value="Update">';
    } else {
        //dit is de form opmaak indien het niet gaat om een update, maar om een record toe te voegen
        $form='<label for="description_in">Description :
        <input class="form-control" type="text" name="description_in" size="40" value=""/></label>
        <br>
        <input type="checkbox" name="finished_in" value="0" hidden="true">
        <input type="submit" name="submit" value="Insert">';
    }
    echo $form;
    ?>

    <ul>
    <?php
    foreach ($todos as $todo)  :
        //maak de html voor elk listitem
        $todorecord = '<li>
        <input type="checkbox" name="finished" value="1" ' . (($todo['Finished'] == 1) ? 'checked="checked"' : '') . ' disabled="disabled" >
        ' .$todo['Description'] . '
        <input type="submit" formaction="todo?action=Update&id='. $todo['id'] . '&description=' . $todo['Description'] .
            '&finished=' . (($todo['Finished'] == 1) ? '1' : '0') .
            '"name="update" value="Update">
        <input type="submit" formaction="todo?action=Delete&id='. $todo['id'] .'" name="delete" value="Delete">
        </li>';

        echo $todorecord;
    endforeach; ?>
    </ul>
</form>
</body>
</html>

