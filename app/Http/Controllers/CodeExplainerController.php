<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Services\OpenRouterServices;

/**
 * Class CodeExplainerController
 *
 * Handles rendering the code explainer UI and processing
 * user-submitted code snippets using the OpenRouter service.
 *
 * Responsibilities:
 * - Display the explainer form
 * - Delegate explanation logic to OpenRouterServices
 * - Return the explanation to the UI
 *
 * @package App\Http\Controllers
 */
class CodeExplainerController extends Controller
{
    /**
     * OpenRouter service instance.
     * @var OpenRouterService 
     */
    protected OpenRouterServices $debugSnippet;

    /**
     * @var OpenRouterService $debugSnippet
     */
    public function __construct(OpenRouterServices $debugSnippet)
    {
        $this->debugSnippet = $debugSnippet;
    }

    /**
     * Show the code explainer page.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        return view('explainer');
    }   

    /**
     * Explain submitted code.
     *
     * @param Request $request
     * @return View
     */
    public function explain(Request $request): View
    {
        $code = $request->input('code');
        $explaination = $this->debugSnippet->explainCode($code);
        return view('/explainer',[
            'code' => $code,
            'explaination' => $explaination
        ]);
    }
}
