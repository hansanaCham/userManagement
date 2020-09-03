<?php

namespace App\Repositories;

use App\SurayParamAttribute;
use App\SurveyResult;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SurveyRepository
 *
 * @author viraj
 */
class SurveyRepository {

    public function getTable($id) {
        return SurayParamAttribute::
                        join('parameters', 'suray_param_attributes.parameter_id', '=', 'parameters.id') // add ,'left' if needed
                        ->join('survey_attributes', 'suray_param_attributes.survey_attribute_id', '=', 'survey_attributes.id', 'right')
                        ->where('survey_attributes.survey_title_id', $id)
                        ->orderBy('survey_attributes.id', 'asc')
                        ->select('survey_attributes.name AS attr_name', 'parameters.name AS para_name', 'suray_param_attributes.type', 'survey_attributes.id AS attr_id')
                        ->get();
    }

    public function getValuesTable_() {
        return SurveyResult::join('suray_param_attributes', 'survey_results.suray_param_attribute_id', '=', 'suray_param_attributes.id')
                        ->join('parameters', 'suray_param_attributes.parameter_id', '=', 'parameters.id')
                        ->join('survey_titles', 'parameters.titleId', '=', 'survey_titles.id')
                        ->join('survey_attributes', 'suray_param_attributes.survey_attribute_id', '=', 'survey_attributes.id')
                        ->orderBy('suray_param_attributes.id', 'asc')
                        ->select('survey_results.suray_param_attribute_id', 'survey_results.text', 'survey_results.date', 'survey_results.number', 'suray_param_attributes.type', 'parameters.name AS param_name', 'parameters.id AS param_id', 'survey_titles.name AS titlle_name', 'survey_attributes.name AS attr_name', 'survey_attributes.id AS attr_id', 'survey_titles.id AS title_id')
                        ->get();
    }
    
    public function getValuesTable($sessionId, $laId) {
        return SurveyResult::join('suray_param_attributes', 'survey_results.suray_param_attribute_id', '=', 'suray_param_attributes.id')
                ->join('parameters', 'suray_param_attributes.parameter_id', '=', 'parameters.id')
                ->join('survey_attributes', 'suray_param_attributes.survey_attribute_id', '=', 'survey_attributes.id')
                ->join('survey_titles', 'survey_attributes.survey_title_id', '=', 'survey_titles.id')
                ->join('main_titles', 'survey_titles.main_title_id', '=', 'main_titles.id')
                ->orderBy('main_no', 'asc')
                ->orderBy('title_no', 'asc')
                ->orderBy('attr_no', 'asc')
                ->where('survey_results.survey_session_id', $sessionId)
                ->where('survey_results.local_authority_id', $laId)
                ->select('suray_param_attributes.parameter_id', 'parameters.name AS param_name', 'suray_param_attributes.survey_attribute_id', 'survey_attributes.name AS attr_name', 'survey_attributes.survey_title_id', 'survey_titles.name AS title_name', 'survey_results.text', 'survey_results.date', 'survey_results.number', 'survey_results.image', 'suray_param_attributes.type', 'survey_titles.main_title_id', 'main_titles.name AS main_title_name', 'main_titles.title_no AS main_no', 'survey_titles.title_no AS title_no', 'survey_attributes.title_no AS attr_no')
                ->get();
    }
}
