<?php

namespace Base;

use \Options as ChildOptions;
use \OptionsQuery as ChildOptionsQuery;
use \Exception;
use \PDO;
use Map\OptionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'options' table.
 *
 *
 *
 * @method     ChildOptionsQuery orderByOptionid($order = Criteria::ASC) Order by the optionID column
 * @method     ChildOptionsQuery orderByEventid($order = Criteria::ASC) Order by the eventID column
 * @method     ChildOptionsQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method     ChildOptionsQuery orderByImage($order = Criteria::ASC) Order by the image column
 * @method     ChildOptionsQuery orderByVotecount($order = Criteria::ASC) Order by the voteCount column
 * @method     ChildOptionsQuery orderByCorrect($order = Criteria::ASC) Order by the correct column
 *
 * @method     ChildOptionsQuery groupByOptionid() Group by the optionID column
 * @method     ChildOptionsQuery groupByEventid() Group by the eventID column
 * @method     ChildOptionsQuery groupByText() Group by the text column
 * @method     ChildOptionsQuery groupByImage() Group by the image column
 * @method     ChildOptionsQuery groupByVotecount() Group by the voteCount column
 * @method     ChildOptionsQuery groupByCorrect() Group by the correct column
 *
 * @method     ChildOptionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOptionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOptionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOptionsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOptionsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOptionsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOptionsQuery leftJoinEvents($relationAlias = null) Adds a LEFT JOIN clause to the query using the Events relation
 * @method     ChildOptionsQuery rightJoinEvents($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Events relation
 * @method     ChildOptionsQuery innerJoinEvents($relationAlias = null) Adds a INNER JOIN clause to the query using the Events relation
 *
 * @method     ChildOptionsQuery joinWithEvents($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Events relation
 *
 * @method     ChildOptionsQuery leftJoinWithEvents() Adds a LEFT JOIN clause and with to the query using the Events relation
 * @method     ChildOptionsQuery rightJoinWithEvents() Adds a RIGHT JOIN clause and with to the query using the Events relation
 * @method     ChildOptionsQuery innerJoinWithEvents() Adds a INNER JOIN clause and with to the query using the Events relation
 *
 * @method     ChildOptionsQuery leftJoinVotes($relationAlias = null) Adds a LEFT JOIN clause to the query using the Votes relation
 * @method     ChildOptionsQuery rightJoinVotes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Votes relation
 * @method     ChildOptionsQuery innerJoinVotes($relationAlias = null) Adds a INNER JOIN clause to the query using the Votes relation
 *
 * @method     ChildOptionsQuery joinWithVotes($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Votes relation
 *
 * @method     ChildOptionsQuery leftJoinWithVotes() Adds a LEFT JOIN clause and with to the query using the Votes relation
 * @method     ChildOptionsQuery rightJoinWithVotes() Adds a RIGHT JOIN clause and with to the query using the Votes relation
 * @method     ChildOptionsQuery innerJoinWithVotes() Adds a INNER JOIN clause and with to the query using the Votes relation
 *
 * @method     \EventsQuery|\VotesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildOptions findOne(ConnectionInterface $con = null) Return the first ChildOptions matching the query
 * @method     ChildOptions findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOptions matching the query, or a new ChildOptions object populated from the query conditions when no match is found
 *
 * @method     ChildOptions findOneByOptionid(int $optionID) Return the first ChildOptions filtered by the optionID column
 * @method     ChildOptions findOneByEventid(int $eventID) Return the first ChildOptions filtered by the eventID column
 * @method     ChildOptions findOneByText(string $text) Return the first ChildOptions filtered by the text column
 * @method     ChildOptions findOneByImage(string $image) Return the first ChildOptions filtered by the image column
 * @method     ChildOptions findOneByVotecount(int $voteCount) Return the first ChildOptions filtered by the voteCount column
 * @method     ChildOptions findOneByCorrect(boolean $correct) Return the first ChildOptions filtered by the correct column *

 * @method     ChildOptions requirePk($key, ConnectionInterface $con = null) Return the ChildOptions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOptions requireOne(ConnectionInterface $con = null) Return the first ChildOptions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOptions requireOneByOptionid(int $optionID) Return the first ChildOptions filtered by the optionID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOptions requireOneByEventid(int $eventID) Return the first ChildOptions filtered by the eventID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOptions requireOneByText(string $text) Return the first ChildOptions filtered by the text column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOptions requireOneByImage(string $image) Return the first ChildOptions filtered by the image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOptions requireOneByVotecount(int $voteCount) Return the first ChildOptions filtered by the voteCount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOptions requireOneByCorrect(boolean $correct) Return the first ChildOptions filtered by the correct column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOptions[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOptions objects based on current ModelCriteria
 * @method     ChildOptions[]|ObjectCollection findByOptionid(int $optionID) Return ChildOptions objects filtered by the optionID column
 * @method     ChildOptions[]|ObjectCollection findByEventid(int $eventID) Return ChildOptions objects filtered by the eventID column
 * @method     ChildOptions[]|ObjectCollection findByText(string $text) Return ChildOptions objects filtered by the text column
 * @method     ChildOptions[]|ObjectCollection findByImage(string $image) Return ChildOptions objects filtered by the image column
 * @method     ChildOptions[]|ObjectCollection findByVotecount(int $voteCount) Return ChildOptions objects filtered by the voteCount column
 * @method     ChildOptions[]|ObjectCollection findByCorrect(boolean $correct) Return ChildOptions objects filtered by the correct column
 * @method     ChildOptions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OptionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OptionsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'sportsbet', $modelName = '\\Options', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOptionsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOptionsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOptionsQuery) {
            return $criteria;
        }
        $query = new ChildOptionsQuery();
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
     * @return ChildOptions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OptionsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OptionsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildOptions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT optionID, eventID, text, image, voteCount, correct FROM options WHERE optionID = :p0';
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
            /** @var ChildOptions $obj */
            $obj = new ChildOptions();
            $obj->hydrate($row);
            OptionsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildOptions|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OptionsTableMap::COL_OPTIONID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OptionsTableMap::COL_OPTIONID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the optionID column
     *
     * Example usage:
     * <code>
     * $query->filterByOptionid(1234); // WHERE optionID = 1234
     * $query->filterByOptionid(array(12, 34)); // WHERE optionID IN (12, 34)
     * $query->filterByOptionid(array('min' => 12)); // WHERE optionID > 12
     * </code>
     *
     * @param     mixed $optionid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByOptionid($optionid = null, $comparison = null)
    {
        if (is_array($optionid)) {
            $useMinMax = false;
            if (isset($optionid['min'])) {
                $this->addUsingAlias(OptionsTableMap::COL_OPTIONID, $optionid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($optionid['max'])) {
                $this->addUsingAlias(OptionsTableMap::COL_OPTIONID, $optionid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OptionsTableMap::COL_OPTIONID, $optionid, $comparison);
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
     * @return $this|ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByEventid($eventid = null, $comparison = null)
    {
        if (is_array($eventid)) {
            $useMinMax = false;
            if (isset($eventid['min'])) {
                $this->addUsingAlias(OptionsTableMap::COL_EVENTID, $eventid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($eventid['max'])) {
                $this->addUsingAlias(OptionsTableMap::COL_EVENTID, $eventid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OptionsTableMap::COL_EVENTID, $eventid, $comparison);
    }

    /**
     * Filter the query on the text column
     *
     * Example usage:
     * <code>
     * $query->filterByText('fooValue');   // WHERE text = 'fooValue'
     * $query->filterByText('%fooValue%', Criteria::LIKE); // WHERE text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $text The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByText($text = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($text)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OptionsTableMap::COL_TEXT, $text, $comparison);
    }

    /**
     * Filter the query on the image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE image = 'fooValue'
     * $query->filterByImage('%fooValue%', Criteria::LIKE); // WHERE image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OptionsTableMap::COL_IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the voteCount column
     *
     * Example usage:
     * <code>
     * $query->filterByVotecount(1234); // WHERE voteCount = 1234
     * $query->filterByVotecount(array(12, 34)); // WHERE voteCount IN (12, 34)
     * $query->filterByVotecount(array('min' => 12)); // WHERE voteCount > 12
     * </code>
     *
     * @param     mixed $votecount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByVotecount($votecount = null, $comparison = null)
    {
        if (is_array($votecount)) {
            $useMinMax = false;
            if (isset($votecount['min'])) {
                $this->addUsingAlias(OptionsTableMap::COL_VOTECOUNT, $votecount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($votecount['max'])) {
                $this->addUsingAlias(OptionsTableMap::COL_VOTECOUNT, $votecount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OptionsTableMap::COL_VOTECOUNT, $votecount, $comparison);
    }

    /**
     * Filter the query on the correct column
     *
     * Example usage:
     * <code>
     * $query->filterByCorrect(true); // WHERE correct = true
     * $query->filterByCorrect('yes'); // WHERE correct = true
     * </code>
     *
     * @param     boolean|string $correct The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByCorrect($correct = null, $comparison = null)
    {
        if (is_string($correct)) {
            $correct = in_array(strtolower($correct), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(OptionsTableMap::COL_CORRECT, $correct, $comparison);
    }

    /**
     * Filter the query by a related \Events object
     *
     * @param \Events|ObjectCollection $events The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByEvents($events, $comparison = null)
    {
        if ($events instanceof \Events) {
            return $this
                ->addUsingAlias(OptionsTableMap::COL_EVENTID, $events->getEventid(), $comparison);
        } elseif ($events instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OptionsTableMap::COL_EVENTID, $events->toKeyValue('PrimaryKey', 'Eventid'), $comparison);
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
     * @return $this|ChildOptionsQuery The current query, for fluid interface
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
     * Filter the query by a related \Votes object
     *
     * @param \Votes|ObjectCollection $votes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildOptionsQuery The current query, for fluid interface
     */
    public function filterByVotes($votes, $comparison = null)
    {
        if ($votes instanceof \Votes) {
            return $this
                ->addUsingAlias(OptionsTableMap::COL_OPTIONID, $votes->getOptionid(), $comparison);
        } elseif ($votes instanceof ObjectCollection) {
            return $this
                ->useVotesQuery()
                ->filterByPrimaryKeys($votes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVotes() only accepts arguments of type \Votes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Votes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildOptionsQuery The current query, for fluid interface
     */
    public function joinVotes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Votes');

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
            $this->addJoinObject($join, 'Votes');
        }

        return $this;
    }

    /**
     * Use the Votes relation Votes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \VotesQuery A secondary query class using the current class as primary query
     */
    public function useVotesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVotes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Votes', '\VotesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOptions $options Object to remove from the list of results
     *
     * @return $this|ChildOptionsQuery The current query, for fluid interface
     */
    public function prune($options = null)
    {
        if ($options) {
            $this->addUsingAlias(OptionsTableMap::COL_OPTIONID, $options->getOptionid(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the options table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OptionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OptionsTableMap::clearInstancePool();
            OptionsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(OptionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OptionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OptionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OptionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OptionsQuery
