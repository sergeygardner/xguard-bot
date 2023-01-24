<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class PollDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromPoll(null));

        $id                      = 'unique_poll_id';
        $question                = 'Question';
        $options                 = [];
        $total_voter_count       = 100;
        $is_closed               = false;
        $is_anonymous            = false;
        $type                    = 'regular';
        $allows_multiple_answers = true;
        $correct_option_id       = 0;
        $explanation             = 'ExplanationOfPoll';
        $explanation_entities    = [];
        $open_period             = 1;
        $close_date              = time() + 1;
        $pollDTO                 = $DTOFactoryService->createDTOFromPoll(
            $poll = [
                'id'                      => $id,
                'question'                => $question,
                'options'                 => $options,
                'total_voter_count'       => $total_voter_count,
                'is_closed'               => $is_closed,
                'is_anonymous'            => $is_anonymous,
                'type'                    => $type,
                'allows_multiple_answers' => $allows_multiple_answers,
                'correct_option_id'       => $correct_option_id,
                'explanation'             => $explanation,
                'explanation_entities'    => $explanation_entities,
                'open_period'             => $open_period,
                'close_date'              => $close_date,
            ]
        );
        self::assertIsObject($pollDTO);
        self::assertEquals($id, $pollDTO->id);
        self::assertEquals($question, $pollDTO->question);
        self::assertEquals($options, $pollDTO->options);
        self::assertEquals($total_voter_count, $pollDTO->total_voter_count);
        self::assertEquals($is_closed, $pollDTO->is_closed);
        self::assertEquals($is_anonymous, $pollDTO->is_anonymous);
        self::assertEquals($type, $pollDTO->type);
        self::assertEquals($allows_multiple_answers, $pollDTO->allows_multiple_answers);
        self::assertEquals($correct_option_id, $pollDTO->correct_option_id);
        self::assertEquals($explanation, $pollDTO->explanation);
        self::assertEquals($explanation_entities, $pollDTO->explanation_entities);
        self::assertEquals($open_period, $pollDTO->open_period);
        self::assertEquals($close_date, $pollDTO->close_date);
        self::assertEquals(
            json_encode($poll, JSON_THROW_ON_ERROR),
            json_encode($pollDTO, JSON_THROW_ON_ERROR)
        );
    }
}
