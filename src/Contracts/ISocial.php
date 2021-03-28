<?php

declare(strict_types=1);


namespace labile\PublicRelations\Contracts;

/**
 * Interface ISocial
 * @package labile\PublicRelations
 */
interface ISocial
{
    /**
     * Установить текст
     * @param string $item
     * @return static
     */
    public function setText(string $item): static;

    /**
     * Установить вложения
     * @param string ...$item
     * @return static
     */
    public function setAttachment(string ...$item): static;

    /**
     * Отправить объект получателю\получателям
     * @param int ...$recipient
     * @return array
     */
    public function send(int ...$recipient): array;
}