<?php // WP_Tables.php

function WP_Table($result) {

    while ($row = $result->fetch_assoc()) {


        echo <<<END
        <pre>
        Argument: $arg1 Rebuttal: $reb1
        </pre>
        END;

        echo <<<END
        <pre>
        Inverse Argument: $inv_arg1 Inverse Rebuttal: $inv_reb1
        </pre>
        END;
    }

}
