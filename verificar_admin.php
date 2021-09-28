<?php

    function verificar_admin()
    {
        if(!isset($_SESSION["rol"]))
        {
            return false;
        }
        else
        {
            if(!$_SESSION["rol"]=="admin")
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }
    
    function admin_tab_active()
    {
        if(verificar_admin())
        {
            echo '<li class="nav-item">
                    <a class="nav-link active" href="admin_index.php">Admin</a>
                </li>';
        }
    }

    function admin_tab()
    {
        if(verificar_admin())
        {
            echo '<li class="nav-item">
                    <a class="nav-link" href="admin_index.php">Admin</a>
                </li>';
        }
    }

?>