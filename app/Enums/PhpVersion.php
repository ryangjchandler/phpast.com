<?php

namespace App\Enums;

use PhpParser\Parser;
use PhpParser\ParserFactory;
use PhpParser\PhpVersion as ParserPhpVersion;

enum PhpVersion: string
{
    case Php80 = '8.0';
    case Php81 = '8.1';
    case Php82 = '8.2';
    case Php83 = '8.3';
    case Php84 = '8.4';

    public function toDisplayable(): string
    {
        return match ($this) {
            self::Php80 => 'PHP 8.0',
            self::Php81 => 'PHP 8.1',
            self::Php82 => 'PHP 8.2',
            self::Php83 => 'PHP 8.3',
            self::Php84 => 'PHP 8.4',
        };
    }

    public function toPhpParser(): Parser
    {
        return (new ParserFactory)->createForVersion(match ($this) {
            self::Php80 => ParserPhpVersion::fromComponents(8, 0),
            self::Php81 => ParserPhpVersion::fromComponents(8, 1),
            self::Php82 => ParserPhpVersion::fromComponents(8, 2),
            self::Php83 => ParserPhpVersion::fromComponents(8, 3),
            self::Php84 => ParserPhpVersion::fromComponents(8, 4),
        });
    }

    public static function toOptions(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (PhpVersion $case) => [
                $case->value => $case->toDisplayable(),
            ])
            ->all();
    }
}
