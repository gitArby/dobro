<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/bootstrap.php';

use App\Entity\Model;
use Doctrine\ORM\EntityManager;

$entityManager = getEntityManager();

$manufacturerFilter = $_GET['manufacturer'] ?? null;
$modelFilter = $_GET['model'] ?? null;

$qb = $entityManager->createQueryBuilder();
$qb->select('m', 'manu', 'c', 'o')
   ->from(Model::class, 'm')
   ->join('m.manufacturer', 'manu')
   ->leftJoin('m.cars', 'c')
   ->leftJoin('c.owner', 'o');

if ($manufacturerFilter) {
    $qb->andWhere('manu.manufacturer_name LIKE :manu')
       ->setParameter('manu', '%' . $manufacturerFilter . '%');
}

if ($modelFilter) {
    $qb->andWhere('m.model_name LIKE :model')
       ->setParameter('model', '%' . $modelFilter . '%');
}

$models = $qb->getQuery()->getResult();

?>
<h1>Seznam modelu vozidel</h1>

<form method="get">
    <label>Vyrobce: <input type="text" name="manufacturer" value="<?= htmlspecialchars($manufacturerFilter) ?>"></label>
    <label>Model: <input type="text" name="model" value="<?= htmlspecialchars($modelFilter) ?>"></label>
    <button type="submit">Filtrovat</button>
</form>

<table border="1" cellpadding="5">
    <tr>
        <th>Model</th>
        <th>Vyrobce</th>
        <th>Majitel</th>
    </tr>
    <?php foreach ($models as $model): ?>
        <tr>
            <td><?= htmlspecialchars($model->getModelName()) ?></td>
            <td><?= htmlspecialchars($model->getManufacturer()->getManufacturerName()) ?></td>
            <td>
                <?php
                $owners = [];
                foreach ($model->getCars() as $car) {
                    $owner = $car->getOwner();
                    if ($owner) {
                        $owners[] = htmlspecialchars($owner->getFirstName() . ' ' . $owner->getLastName() . ' (' . $owner->getEmail() . ')');
                    }
                }
                echo implode('<br>', $owners);
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
