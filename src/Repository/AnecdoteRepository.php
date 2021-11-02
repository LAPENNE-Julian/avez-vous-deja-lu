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
        $qb = $this->getEntityManager()->createQueryBuilder();

        $qb->select('a')
            ->from('App\Entity\Anecdote', 'a')
            ->join('a.upVoteUsers', 'voter');

            $query = $qb->getQuery();
            
            //Limit to 5 results
            $query->setMaxResults(5);
            $result = $query->execute();

            return $result;
        
    }
}
