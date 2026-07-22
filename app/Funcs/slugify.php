<?php

function slugify(string $value): string
{
    return str_replace(
        ' ',
        '-',
        strtolower($value)
    );
}
