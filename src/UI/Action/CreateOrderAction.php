<?php
declare(strict_types=1);


namespace App\UI\Action;


use App\Order\Application\Command\CreateOrder\CreateOrderCommand;
use App\Order\Infrastructure\DTO\CreateOrderDTO;
use App\Order\Infrastructure\Exception\CannotCreateOrderException;
use App\Shared\Command\CommandBusInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/order/create', name: 'create_order', methods: ['POST'])]
final readonly class CreateOrderAction
{
    public function __construct(
        private CommandBusInterface $commandBus,
    )
    {
    }

    public function __invoke(
        #[MapRequestPayload] CreateOrderDTO $createOrderDTO,
        Request $request,
    ): JsonResponse
    {
        try{
            $this->commandBus->dispatch(new CreateOrderCommand($createOrderDTO, $request->getClientIp()));

            return new JsonResponse('Order created!', Response::HTTP_CREATED);
        } catch (CannotCreateOrderException $exception){
            return new JsonResponse('Order cannot be created!', Response::HTTP_BAD_REQUEST);
        }
    }
}
