<?php

namespace Base;

use \Dates as ChildDates;
use \DatesQuery as ChildDatesQuery;
use \Exception;
use Map\DatesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'dates' table.
 *
 * 
 *
 * @method     ChildDatesQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildDatesQuery orderBySportid($order = Criteria::ASC) Order by the sportID column
 * @method     ChildDatesQuery orderByEventid($order = Criteria::ASC) Order by the eventID column
 *
 * @method     ChildDatesQuery groupByDate() Group by the date column
 * @method     ChildDatesQuery groupBySportid() Group by the sportID column
 * @method     ChildDatesQuery groupByEventid() Group by the eventID column
 *
 * @method     ChildDatesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDatesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDatesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDatesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDatesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDatesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDatesQuery leftJoinSports($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sports relation
 * @method     ChildDatesQuery rightJoinSports($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sports relation
 * @method     ChildDatesQuery innerJoinSports($relationAlias = null) Adds a INNER JOIN clause to the query using the Sports relation
 *
 * @method     ChildDatesQuery joinWithSports($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Sports relation
 *
 * @method     ChildDatesQuery leftJoinWithSports() Adds a LEFT JOIN clause and with to the query using the Sports relation
 * @method     ChildDatesQuery rightJoinWithSports() Adds a RIGHT JOIN clause and with to the query using the Sports relation
 * @method     ChildDatesQuery innerJoinWithSports() Adds a INNER JOIN clause and with to the query using the Sports relation
 *
 * @method     ChildDatesQuery leftJoinEvents($relationAlias = null) Adds a LEFT JOIN clause to the query using the Events relation
 * @method     ChildDatesQuery rightJoinEvents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Events relation
 * @method     ChildDatesQuery innerJoinEvents($relationAlias = null) Adds a INNER JOIN clause to the query using the Events relation
 *
 * @method     ChildDatesQuery joinWithEvents($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Events relation
 *
 * @method     ChildDatesQuery leftJoinWithEvents() Adds a LEFT JOIN clause and with to the query using the Events relation
 * @method     ChildDatesQuery rightJoinWithEvents() Adds a RIGHT JOIN clause and with to the query using the Events relation
 * @method     ChildDatesQuery innerJoinWithEvents() Adds a INNER JOIN clause and with to the query using the Events relation
 *
 * @method     \SportsQuery|\EventsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDates findOne(ConnectionInterface $con = null) Return the first ChildDates matching the query
 * @method     ChildDates findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDates matching the query, or a new ChildDates object populated from the query conditions when no match is found
 *
 * @method     ChildDates findOneByDate(string $date) Return the first ChildDates filtered by the date column
 * @method     ChildDates findOneBySportid(int $sportID) Return the first ChildDates filtered by the sportID column
 * @method     ChildDates findOneByEventid(int $eventID) Return the first ChildDates filtered by the eventID column *

 * @method     ChildDates requirePk($key, ConnectionInterface $con = null) Return the ChildDates by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDates requireOne(ConnectionInterface $con = null) Return the first ChildDates matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDates requireOneByDate(string $date) Return the first ChildDates filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDates requireOneBySportid(int $sportID) Return the first ChildDates filtered by the sportID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDates requireOneByEventid(int $eventID) Return the first ChildDates filtered by the eventID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDates[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDates objects based on current ModelCriteria
 * @method     ChildDates[]|ObjectCollection findByDate(string $date) Return ChildDates objects filtered by the date column
 * @method     ChildDates[]|ObjectCollection findBySportid(int $sportID) Return ChildDates objects filtered by the sportID column
 * @method     ChildDates[]|ObjectCollection findByEventid(int $eventID) Return ChildDates objects filtered by the eventID column
 * @method     ChildDates[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DatesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\DatesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'sportsbet', $modelName = '\\Dates', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDatesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDatesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDatesQuery) {
            return $criteria;
        }
        $query = new ChildDatesQuery();
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
     * @return ChildDates|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        throw new LogicException('The Dates object has no primary key');
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        throw new LogicException('The Dates object has no primary key');
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildDatesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        throw new LogicException('The Dates object has no primary key');
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDatesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        throw new LogicException('The Dates object has no primary key');
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDatesQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(DatesTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(DatesTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatesTableMap::COL_DATE, $date, $comparison);
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
     * @see       filterBySports()
     *
     * @param     mixed $sportid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDatesQuery The current query, for fluid interface
     */
    public function filterBySportid($sportid = null, $comparison = null)
    {
        if (is_array($sportid)) {
            $useMinMax = false;
            if (isset($sportid['min'])) {
                $this->addUsingAlias(DatesTableMap::COL_SPORTID, $sportid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sportid['max'])) {
                $this->addUsingAlias(DatesTableMap::COL_SPORTID, $sportid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatesTableMap::COL_SPORTID, $sportid, $comparison);
    }

    /**
     * Filter the query on the eventID column
     *
     * Example usage:
     * <code>
     * $query->filterByEventid(1234); // WHERE eventID = 1234
     * $query->filterByEventid(array(12, 34)); // WHERE eventID IN (12, 34)
     * $query->filterByEventid(array('min' => 12)); // WHERE eventID > 12
     * </code>
     *
     * @see       filterByEvents()
     *
     * @param     mixed $eventid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDatesQuery The current query, for fluid interface
     */
    public function filterByEventid($eventid = null, $comparison = null)
    {
        if (is_array($eventid)) {
            $useMinMax = false;
            if (isset($eventid['min'])) {
                $this->addUsingAlias(DatesTableMap::COL_EVENTID, $eventid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventid['max'])) {
                $this->addUsingAlias(DatesTableMap::COL_EVENTID, $eventid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DatesTableMap::COL_EVENTID, $eventid, $comparison);
    }

    /**
     * Filter the query by a related \Sports object
     *
     * @param \Sports|ObjectCollection $sports The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDatesQuery The current query, for fluid interface
     */
    public function filterBySports($sports, $comparison = null)
    {
        if ($sports instanceof \Sports) {
            return $this
                ->addUsingAlias(DatesTableMap::COL_SPORTID, $sports->getSportid(), $comparison);
        } elseif ($sports instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DatesTableMap::COL_SPORTID, $sports->toKeyValue('PrimaryKey', 'Sportid'), $comparison);
        } else {
            throw new PropelException('filterBySports() only accepts arguments of type \Sports or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sports relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDatesQuery The current query, for fluid interface
     */
    public function joinSports($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sports');

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
            $this->addJoinObject($join, 'Sports');
        }

        return $this;
    }

    /**
     * Use the Sports relation Sports object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SportsQuery A secondary query class using the current class as primary query
     */
    public function useSportsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSports($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sports', '\SportsQuery');
    }

    /**
     * Filter the query by a related \Events object
     *
     * @param \Events|ObjectCollection $events The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDatesQuery The current query, for fluid interface
     */
    public function filterByEvents($events, $comparison = null)
    {
        if ($events instanceof \Events) {
            return $this
                ->addUsingAlias(DatesTableMap::COL_EVENTID, $events->getEventid(), $comparison);
        } elseif ($events instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DatesTableMap::COL_EVENTID, $events->toKeyValue('PrimaryKey', 'Eventid'), $comparison);
        } else {
            throw new PropelException('filterByEvents() only accepts arguments of type \Events or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Events relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDatesQuery The current query, for fluid interface
     */
    public function joinEvents($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Events');

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
            $this->addJoinObject($join, 'Events');
        }

        return $this;
    }

    /**
     * Use the Events relation Events object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \EventsQuery A secondary query class using the current class as primary query
     */
    public function useEventsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEvents($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Events', '\EventsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDates $dates Object to remove from the list of results
     *
     * @return $this|ChildDatesQuery The current query, for fluid interface
     */
    public function prune($dates = null)
    {
        if ($dates) {
            throw new LogicException('Dates object has no primary key');

        }

        return $this;
    }

    /**
     * Deletes all rows from the dates table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DatesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DatesTableMap::clearInstancePool();
            DatesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(DatesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DatesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            DatesTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            DatesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DatesQuery
