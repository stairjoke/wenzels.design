<?php

namespace Kirby\Cms;

use Kirby\Toolkit\Str;

/**
 * The Item class is the foundation
 * for every object in context with
 * other objects. I.e.
 *
 * - a Block in a collection of Blocks
 * - a Layout in a collection of Layouts
 * - a Column in a collection of Columns
 * @since 3.5.0
 *
 * @package   Kirby Cms
 * @author    Bastian Allgeier <bastian@getkirby.com>
 * @link      https://getkirby.com
 * @copyright Bastian Allgeier
 * @license   https://getkirby.com/license
 */
class Item
{
	use HasSiblings;

	public const ITEMS_CLASS = Items::class;

	protected Field|null $field;

	/**
	 * @var string
	 */
	protected $id;

	/**
	 * @var array
	 */
	protected $params;

	/**
	 * @var \Kirby\Cms\Page|\Kirby\Cms\Site|\Kirby\Cms\File|\Kirby\Cms\User
	 */
	protected $parent;

	/**
	 * @var \Kirby\Cms\Items
	 */
	protected $siblings;

	/**
	 * Creates a new item
	 *
	 * @param array $params
	 */
	public function __construct(array $params = [])
	{
		$siblingsClass = static::ITEMS_CLASS;

		$this->id       = $params['id']       ?? Str::uuid();
		$this->params   = $params;
		$this->field    = $params['field']    ?? null;
		$this->parent   = $params['parent']   ?? App::instance()->site();
		$this->siblings = $params['siblings'] ?? new $siblingsClass();
	}

	/**
	 * Static Item factory
	 *
	 * @param array $params
	 * @return \Kirby\Cms\Item
	 */
	public static function factory(array $params)
	{
		return new static($params);
	}

	/**
	 * Returns the parent field if known
	 */
	public function field(): Field|null
	{
		return $this->field;
	}

	/**
	 * Returns the unique item id (UUID v4)
	 *
	 * @return string
	 */
	public function id(): string
	{
		return $this->id;
	}

	/**
	 * Compares the item to another one
	 *
	 * @param \Kirby\Cms\Item $item
	 * @return bool
	 */
	public function is(Item $item): bool
	{
		return $this->id() === $item->id();
	}

	/**
	 * Returns the Kirby instance
	 *
	 * @return \Kirby\Cms\App
	 */
	public function kirby()
	{
		return $this->parent()->kirby();
	}

	/**
	 * Returns the parent model
	 *
	 * @return \Kirby\Cms\Page|\Kirby\Cms\Site|\Kirby\Cms\File|\Kirby\Cms\User
	 */
	public function parent()
	{
		return $this->parent;
	}

	/**
	 * Returns the sibling collection
	 * This is required by the HasSiblings trait
	 *
	 * @return \Kirby\Cms\Items
	 * @psalm-return self::ITEMS_CLASS
	 */
	protected function siblingsCollection()
	{
		return $this->siblings;
	}

	/**
	 * Converts the item to an array
	 *
	 * @return array
	 */
	public function toArray(): array
	{
		return [
			'id' => $this->id(),
		];
	}
}
