
    <h1>Users !</h1>
    <table class="table">
        
            <tr>
                <th> ID </th>
                <th> Last Name </th>
                <th> First name </th>
                <th> Email </th>
                <th> Adresse </th>
            </tr>
            <?php
            foreach ($users as $user) :
            ?>
            <tr>
                <td><?= $user->getId(); ?></td>
                <td><?= $user->getLastname(); ?></td>
                <td><?= $user->getFirstname(); ?></td>
                <td><?= $user->getEmail(); ?></td>
                <td><?= $user->getAdresse(); ?></td>
            </tr>
            <?php 
            endforeach;
            ?>
    </table>


