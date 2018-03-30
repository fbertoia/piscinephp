#!/usr/bin/env php
<?PHP
$stdin = fopen('php://stdin', 'r');
$ret = Array();
$stat_users = Array();
$moy_g = 0;
$i = 0;
if ($argc < 2)
    return (0);
if (($stdin = fopen('php://stdin', 'r')) === false)
    return (1);
while ($ret = fgetcsv($stdin, 1000, ";"))
{
    if ($i)
    {
        $moy_g += $ret[1];
        $stat_users["sum_grade"][$ret[0]] += $ret[1];        
        $stat_users["nb_grade"][$ret[0]] += 1;
        if ($ret[2] === "moulinette")
        {
            $stat_users["mouli_grade"][$ret[0]] += $ret[1];
            $stat_users["mouli_grade_nb"][$ret[0]] += 1;            
        }
        else
        {
            $stat_users["correct_grade"][$ret[0]] += $ret[1];
            $stat_users["correct_grade_nb"][$ret[0]] += 1;
        }
    }
    $i++;
}
switch ($argv[1])
{
    case "moyenne":
        $moy_g /= $i;
        printf("$moy_g\n");
    case "moyenne_user":
        $keys = array_keys($stat_users["sum_grade"]);
        for ($i = 0 ; $keys[$i] ; $i++)
        {
            if ($stat_users["sum_grade"][$keys[$i]])
            {
                $moy = $stat_users["sum_grade"][$keys[$i]]
                        / $stat_users["nb_grade"][$keys[$i]];
                printf("$keys[$i]:$moy\n");
            }
        }
    case "ecart_moulinette":
        $keys = array_keys($stat_users["correct_grade"]);
        for ($i = 0 ; $keys[$i] ; $i++)
        {
            if ($stat_users["correct_grade"][$keys[$i]]
                && $stat_users["mouli_grade"][$keys[$i]])
            {
                $moy = $stat_users["correct_grade"][$keys[$i]]
                            / $stat_users["correct_grade_nb"][$keys[$i]];
                $moy -= $stat_users["mouli_grade"][$keys[$i]]
                            / $stat_users["mouli_grade_nb"][$keys[$i]];
                printf("$keys[$i]:$moy\n");
            }
        }
}
?>
