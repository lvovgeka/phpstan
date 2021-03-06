<?php declare(strict_types = 1);

namespace PHPStan\PhpDoc\Tag;

use PHPStan\Reflection\PassedByReference;
use PHPStan\Type\Type;

class MethodTagParameter
{

	/** @var \PHPStan\Type\Type */
	private $type;

	/** @var \PHPStan\Reflection\PassedByReference */
	private $passedByReference;

	/** @var bool */
	private $isOptional;

	/** @var bool */
	private $isVariadic;

	public function __construct(
		Type $type,
		PassedByReference $passedByReference,
		bool $isOptional,
		bool $isVariadic
	)
	{
		$this->type = $type;
		$this->passedByReference = $passedByReference;
		$this->isOptional = $isOptional;
		$this->isVariadic = $isVariadic;
	}

	public function getType(): Type
	{
		return $this->type;
	}

	public function passedByReference(): PassedByReference
	{
		return $this->passedByReference;
	}

	public function isOptional(): bool
	{
		return $this->isOptional;
	}

	public function isVariadic(): bool
	{
		return $this->isVariadic;
	}

	public static function __set_state(array $properties): self
	{
		return new self(
			$properties['type'],
			$properties['passedByReference'],
			$properties['isOptional'],
			$properties['isVariadic']
		);
	}

}
