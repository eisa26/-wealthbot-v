<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * @deprecated
 *
 * AccountOutsideFundRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AccountOutsideFundRepository extends EntityRepository
{
    public function findOneBySecurityIdAndAccountId($securityId, $accountId)
    {
        $qb = $this->createQueryBuilder('aof');
        $qb->leftJoin('aof.securityAssignment', 's')
            ->where('s.security_id = :security_id')
            ->andWhere('aof.account_id = :account_id')
            ->setParameters(
                [
                    'security_id' => $securityId,
                    'account_id' => $accountId,
                ]
            )
            ->setMaxResults(1);

        return $qb->getQuery()->getOneOrNullResult();
    }
}
