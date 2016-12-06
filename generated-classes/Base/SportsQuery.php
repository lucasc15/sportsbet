<?php

namespace Base;

use \Sports as ChildSports;
use \SportsQuery as ChildSportsQuery;
use \Exception;
use \PDO;
use Map\SportsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'sports' table.
 *
 * 
 *
 * @method     ChildSportsQuery orderBySportid($order = Criteria::ASC) Order by the sportID column
 * @method     ChildSportsQuery orderBySport($order = Criteria::ASC) Order by the sport column
 *
 * @method     ChildSportsQuery groupBySportid() Group by the sportID column
 * @method     ChildSportsQuery groupBySport() Group by the sport column
 *
 * @method     ChildSportsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSportsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSportsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSportsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSportsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSportsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSportsQuery leftJoinDates($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dates relation
 * @method     ChildSportsQuery rightJoinDates($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dates relation
 * @method     ChildSportsQuery innerJoinDates($relationAlias = null) Adds a INNER JOIN clause to the query using the Dates relation
 *
 * @method     ChildSportsQuery joinWithDates($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Dates relation
 *
 * @method     ChildSportsQuery leftJoinWithDates() Adds a LEFT JOIN clause and with to the query using the Dates relation
 * @method     ChildSportsQuery rightJoinWithDates() Adds a RIGHT JOIN clause and with to the query using the Dates relation
 * @method     ChildSportsQuery innerJoinWithDates() Adds a INNER JOIN clause and with to the query using the Dates relation
 *
 * @method     \DatesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSports findOne(ConnectionInterface $con = null) Return the first ChildSports matching the query
 * @method     ChildSports findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSports matching the query, or a new ChildSports object populated from the query conditions when no match is found
 *
 * @method     ChildSports findOneBySportid(int $sportID) Return the first ChildSports filtered by the sportID column
 * @method     ChildSports findOneBySport(string $sport) Return the first ChildSports filtered by the sport column *

 * @method     ChildSports requirePk($key, ConnectionInterface $con = null) Return the ChildSports by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSports requireOne(ConnectionInterface $con = null) Return the first ChildSports matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSports requireOneBySportid(int $sportID) Return the first ChildSports filtered by the sportID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSports requireOneBySport(string $sport) Return the first ChildSports filtered by the sport column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSports[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSports objects based on current ModelCriteria
 * @method     ChildSports[]|ObjectCollection findBySportid(int $sportID) Return ChildSports objects filtered by the sportID column
 * @method     ChildSports[]|ObjectCollection findBySport(string $sport) Return ChildSports objects filtered by the sport column
 * @method     ChildSports[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SportsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SportsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'sportsbet', $modelName = '\\Sports', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSportsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSportsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSportsQuery) {
            return $criteria;
        }
        $query = new ChildSportsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSports|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SportsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SportsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSports A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT sportID, sport FROM sports WHERE sportID = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSports $obj */
            $obj = new ChildSports();
            $obj->hydrate($row);
            SportsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildSports|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildSportsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SportsTableMap::COL_SPORTID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSportsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SportsTableMap::COL_SPORTID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the sportID column
     *
     * Example usage:
     * <code>
     * $query->filterBySportid(1234); // WHERE sportID = 1234
     * $query->filterBySportid(array(12, 34)); // WHERE sportID IN (12, 34)
     * $query->filterBySportid(array('min' => 12)); // WHERE sportID > 12
     * </code>
     *
     * @param     mixed $sportid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSportsQuery The current query, for fluid interface
     */
    public function filterBySportid($sportid = null, $comparison = null)
    {
        if (is_array($sportid)) {
            $useMinMax = false;
            if (isset($sportid['min'])) {
                $this->addUsingAlias(SportsTableMap::COL_SPORTID, $sportid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sportid['max'])) {
                $this->addUsingAlias(SportsTableMap::COL_SPORTID, $sportid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SportsTableMap::COL_SPORTID, $sportid, $comparison);
    }

    /**
     * Filter the query on the sport column
     *
     * Example usage:
     * <code>
     * $query->filterBySport('fooValue');   // WHERE sport = 'fooValue'
     * $query->filterBySport('%fooValue%', Criteria::LIKE); // WHERE sport LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sport The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSportsQuery The current query, for fluid interface
     */
    public function filterBySport($sport = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sport)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SportsTableMap::COL_SPORT, $sport, $comparison);
    }

    /**
     * Filter the query by a related \Dates object
     *
     * @param \Dates|ObjectCollection $dates the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSportsQuery The current query, for fluid interface
     */
    public function filterByDates($dates, $comparison = null)
    {
        if ($dates instanceof \Dates) {
            return $this
                ->addUsingAlias(SportsTableMap::COL_SPORTID, $dates->getSportid(), $comparison);
        } elseif ($dates instanceof ObjectCollection) {
            return $this
                ->useDatesQuery()
                ->filterByPrimaryKeys($dates->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDates() only accepts arguments of type \Dates or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Dates relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSportsQuery The current query, for fluid interface
     */
    public function joinDates($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Dates');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Dates');
        }

        return $this;
    }

    /**
     * Use the Dates relation Dates object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \DatesQuery A secondary query class using the current class as primary query
     */
    public function useDatesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDates($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Dates', '\DatesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSports $sports Object to remove from the list of results
     *
     * @return $this|ChildSportsQuery The current query, for fluid interface
     */
    public function prune($sports = null)
    {
        if ($sports) {
            $this->addUsingAlias(SportsTableMap::COL_SPORTID, $sports->getSportid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the sports table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SportsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SportsTableMap::clearInstancePool();
            SportsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SportsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SportsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            SportsTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            SportsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SportsQuery
