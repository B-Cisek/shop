<?php

declare(strict_types=1);

namespace App\DTO;

use App\Http\Requests\Auth\RegisterRequest;

readonly class UserDTO
{
    public function __construct(
        public string $email,
        public string $password,
        public bool $newsletter
    ) {
    }

    public static function fromRequest(RegisterRequest $request): self
    {
        return new self(
            email: $request->validated('email'),
            password: $request->validated('password'),
            newsletter: $request->validated('consents.newsletter')
        );
    }
}
