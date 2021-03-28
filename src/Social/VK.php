<?php

declare(strict_types=1);


namespace labile\PublicRelations\Social;

use ATehnix\VkClient\Client;
use ATehnix\VkClient\Requests\ExecuteRequest;
use ATehnix\VkClient\Requests\Request;
use Exception;
use labile\PublicRelations\Abstracts\Social;

/**
 * Class VK
 * @package labile\PublicRelations\Social
 */
final class VK extends Social
{
    private string $token;
    private string|int $v;

    public function __construct(string $token, string|int $v)
    {
        $this->token = $token;
        $this->v = $v;
    }

    private function auth(): Client
    {
        $client = new Client($this->v);
        $client->setDefaultToken($this->token);

        return $client;
    }

    private function generateRequest(string $method, array $params): array
    {
        if ($this->text === null && $this->attachment === null) {
            throw new Exception("Text and Attachment is empty!");
        }

        foreach ($params['owner_id'] as $id) {
            $params['owner_id'] = $id;
            $execute[] = new Request($method, $params);
        }
        return $this->auth()->send(ExecuteRequest::make($execute));
    }

    public function send(int ...$recipient): array
    {
        return $this->generateRequest('wall.post',
            [
                'owner_id' => $recipient,
                'message' => $this->text,
                'attachments' => $this->attachment
            ]);
    }
}