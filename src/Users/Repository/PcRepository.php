<?php
namespace App\Pc\Repository;
use App\Pc\Entity\Pc;
use Doctrine\DBAL\Connection;
/**
 * User repository.
 */
class PcRepository
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }
   /**
    * Returns a collection of users.
    *
    * @param int $limit
    *   The number of pcs to return.
    * @param int $offset
    *   The number of pcs to skip.
    * @param array $orderBy
    *   Optionally, the order by info, in the $column => $direction format.
    *
    * @return array A collection of pcs, keyed by pc id.
    */
   public function getAll()
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('p.*')
           ->from('pc', 'p');
       $statement = $queryBuilder->execute();
       $usersData = $statement->fetchAll();
       foreach ($pcsData as $pcData) {
           $userEntityList[$pcData['id']] = new Pc($pcData['id'], $pcData['marque'], $pcData['model'], $pcData['os'], $pcData['prix']);
       }
       return $userEntityList;
   }
   /**
    * Returns an Pc object.
    *
    * @param $id
    *   The id of the user to return.
    *
    * @return array A collection of pcs, keyed by pc id.
    */
   public function getById($id)
   {
       $queryBuilder = $this->db->createQueryBuilder();
       $queryBuilder
           ->select('p.*')
           ->from('pcs', 'p')
           ->where('id = ?')
           ->setParameter(0, $id);
       $statement = $queryBuilder->execute();
       $userData = $statement->fetchAll();
       return new User($userData[0]['id'], $userData[0]['marque'], $userData[0]['model'], $userData[0]['os'], $userData[0]['prix']);
   }
    public function delete($id)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->delete('pcs')
          ->where('id = :id')
          ->setParameter(':id', $id);
        $statement = $queryBuilder->execute();
    }
    public function update($parameters)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->update('pcs')
          ->where('id = :id')
          ->setParameter(':id', $parameters['id']);
        if ($parameters['marque']) {
            $queryBuilder
              ->set('pc', ':pc')
              ->setParameter(':pc', $parameters['pc']);
        }
        if ($parameters['model']) {
            $queryBuilder
            ->set('model', ':model')
            ->setParameter(':model', $parameters['model']);
        }
        if($parameters['os']) {
            $queryBuilder
            ->set('os', ':os')
            ->setParameter(':os', $parameters['os']);
        }

        if($parameters['prix']) {
            $queryBuilder
            ->set('prix', ':prix')
            ->setParameter(':prix', $parameters['prix']);
        }
        $statement = $queryBuilder->execute();
        
    }
    public function insert($parameters)
    {
        
        $queryBuilder = $this->db->createQueryBuilder();
        $queryBuilder
          ->insert('pcs')
          ->values(
              array(
                'marque' => ':marque',
                'model' => ':model',
                'os' => ':os',
                'prix' => ':prix',
              )
          )
          ->setParameter(':marque', $parameters['marque'])
          ->setParameter(':model', $parameters['model'])
          ->setParameter(':os', $parameters['os'])
          ->setParameter(':prix', $parameters['prix']);
        $statement = $queryBuilder->execute();
        
    }
}