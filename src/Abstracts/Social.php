<?php

declare(strict_types=1);


namespace labile\PublicRelations\Abstracts;

use Exception;
use labile\PublicRelations\Contracts\ISocial;

/**
 * Class Social
 * @package labile\PublicRelations
 */
abstract class Social implements ISocial
{
    protected ?string $text = null;
    protected ?string $attachment = null;

    public function setText(string $item): static
    {
        return $this->setter($item, 'text');
    }

    public function setAttachment(string ...$item): static
    {
        return $this->setter($item, 'attachment');
    }

    private function setter($item, string $object): static
    {
        if (property_exists($this, $object)) {
            is_array($item) ? $this->$object = implode(',', $item) : $this->$object = $item;
        } else {
            throw new Exception('Указан несуществующий объект');
        }
        return $this;
    }

    abstract public function send(int ...$recipient): array;

}