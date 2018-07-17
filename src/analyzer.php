<?php
$currencies_amount = 10;

if (!empty($_FILES)):

    if (empty($_FILES['file1']['name']) || empty($_FILES['file2']['name'])) {
        ?>
        <div class="alert alert-warning">Choose 2 files to be compared.</div>
        <?php
    } else {
        $file1 = $_FILES['file1'];
        $file2 = $_FILES['file2'];

        try {
            $articles1 = getArticles($file1['tmp_name'], $currencies_amount);
            $articles2 = getArticles($file2['tmp_name'], $currencies_amount);

            $result = check_diff($articles1, $articles2);

            foreach ($result as $title => $differences):
                ?><h4><?php echo $title ?></h4>
                <table class="table table-condensed mb-5">
                <tr>
                    <th style="width: 33%">FACTS</th>
                    <th style="width: 33%">PREDICTION</th>
                    <th style="width: 33%">TERM</th>
                </tr>
                <tr>
                    <td><?php format($differences, 'FACTS') ?></td>
                    <td><?php format($differences, 'PREDICTION') ?></td>
                    <td><?php format($differences, 'TERM') ?></td>
                </tr>
                </table><?php
                $a++;
            endforeach;

        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

endif;

