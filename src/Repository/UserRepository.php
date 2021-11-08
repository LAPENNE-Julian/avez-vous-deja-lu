<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements UserLoaderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function loadUserByIdentifier(string $pseudoOrEmail): ?User
    {
        $entityManager = $this->getEntityManager();

        return $entityManager->createQuery(
                'SELECT u
                FROM App\Entity\User u
                WHERE u.pseudo = :query
                OR u.email = :query'
            )
            ->setParameter('query', $pseudoOrEmail)
            ->getOneOrNullResult();
    }

    /**
     * returns all informations of the user by email
    * @return user Returns a user
    */
    public function findByEmail($email)
    {
        $dql = "SELECT u FROM App\Entity\User u WHERE u.email =". " '$email' ";
    
        $query = $this->getEntityManager()->createQuery($dql);
        $result = $query->execute();

        return $result;
    }

    /** @deprecated since Symfony 5.3 */
    public function loadUserByUsername(string $pseudoOrEmail): ?User
    {
        return $this->loadUserByIdentifier($pseudoOrEmail);
    }
}
