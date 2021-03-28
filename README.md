# Social Mashine

Шеринг информации по социальным сетям

___

## Содержание

1. [Установка](#1-установка)
2. [Методы](#2-методы)
3. [Примеры](#2-примеры)
   + [Отправка поста на стену ВКонтакте](#31-отправка-поста-на-стену-вконтакте)

___

#### 1. Установка

> composer require labile/social-mashine



#### 2. Методы

```php
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
```
#### 3. Примеры

###### 3.1 Отправка поста на стену ВКонтакте

```php
/** Токен */
$access_token = '';

/** Версия vk api */
$v = '5.130';

$socialMashine = new VK($access_token, $v);

$socialMashine
    /** Текст */
    ->setText('Хола бола!')
    /** Вложения */
    ->setAttachment('photo-203359167_457239017', 'photo259166248_457277920', 'photo-203359167_457239017')
    /** Идентификатор группы\страницы с открытой стеной*/
    ->send(-203359167);
```

