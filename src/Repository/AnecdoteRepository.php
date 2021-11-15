<?php

namespace App\Repository;

use App\Entity\Anecdote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Anecdote|null find($id, $lockMode = null, $lockVersion = null)
 * @method Anecdote|null findOneBy(array $criteria, array $orderBy = null)
 * @method Anecdote[]    findAll()
 * @method Anecdote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnecdoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Anecdote::class);
    }

    // /**
    //  * @return Anecdote[] Returns an array of Anecdote objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Anecdote
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * return five anecdotes with the most upvote
    * @return Anecdote[] Returns an array of Anecdote objects
    */
    public function findByupVote()
    {
        $dql = "SELECT a , count(a.id) as upVote FROM App\Entity\Anecdote a " .
        "JOIN a.upVoteUsers u GROUP BY a.id ORDER BY upVote DESC";
        ;
        $query = $this->getEntityManager()->createQuery($dql);

        //limit to five results
        $query->setMaxResults(5);
        $result = $query->execute();

        return $result;
    }
}
