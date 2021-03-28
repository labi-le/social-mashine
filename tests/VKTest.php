<?php

declare(strict_types=1);


namespace labile\PublicRelations\Social;

use PHPUnit\Framework\TestCase;

class VKTest extends TestCase
{
    /**
     * @var VK
     */
    private VK $social;

    protected function setUp(): void
    {
        /** Токен доступа */
        $access_token = '';

        $v = '5.130';
        $this->social = new VK($access_token, $v);
    }

    public function testSend(): void
    {
        $response = $this->social
            /** Текст */
            ->setText('Хола бола!')
            /** Вложения */
            ->setAttachment('photo-203359167_457239017', 'photo259166248_457277920', 'photo-203359167_457239017')
            /** Идентификатор группы\страницы с открытой стеной*/
            ->send(-203359167);

        self::assertIsArray($response);
    }
}
