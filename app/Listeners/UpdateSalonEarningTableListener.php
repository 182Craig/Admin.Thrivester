<?php
/*
 * File name: UpdateSalonEarningTableListener.php
 * Last modified: 2022.10.16 at 11:45:14
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2022
 */

namespace App\Listeners;

use App\Repositories\EarningRepository;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class UpdateSalonEarningTableListener
 * @package App\Listeners
 */
class UpdateSalonEarningTableListener
{
    /**
     * @var EarningRepository
     */
    private $earningRepository;

    /**
     * EarningTableListener constructor.
     */
    public function __construct(EarningRepository $earningRepository)
    {

        $this->earningRepository = $earningRepository;
    }


    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->newSalon->accepted) {
            $uniqueInput = ['salon_id' => $event->newSalon->id];
            try {
                $this->earningRepository->updateOrCreate($uniqueInput);
            } catch (ValidatorException $e) {
            }
        }
    }
}
