<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Http\Requests\VacancyRequest;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Returns vacancies, filtered by filter parameters if they are in the request.
     * The result is paginated to list 2 vacancies per page.
     * The sort order is default to show the latest vacancy first.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        // Default filter parameters
        $filters = [
            'job_title' => '',
            'location' => '',
            'salary' => ''
        ];

        $vacancies = Vacancy::query();

        if ($request->filled('job_title')) {
            $vacancies = $vacancies->where('job_title', 'like', '%' . $request->job_title . '%');
            $filters['job_title'] = $request->job_title;
        }

        if ($request->filled('location')) {
            $vacancies = $vacancies->where('location', 'like', '%' . $request->location . '%');
            $filters['location'] = $request->location;
        }

        if ($request->filled('salary') and is_numeric($request->salary) and ($request->salary > 0)) {
            $vacancies = $vacancies->where('min_salary', '<=', $request->salary)
                ->where('max_salary', '>=', $request->salary);
            $filters['salary'] = $request->salary;
        }

        $vacancies = $vacancies->orderByDesc('created_at')->paginate(2);

        return view('vacancies.index', compact('vacancies', 'filters'));
    }

    /**
     * Displays add new vacancy form.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('vacancies.create');
    }

    /**
     * Save new vacancy in the database if the request is validated.
     *
     * @param VacancyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VacancyRequest $request)
    {
        Vacancy::create([
            'job_title' => $request->job_title,
            'location' => $request->location,
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
        ]);

        flash(__('general.add_vacancy_success'))->success();
        return redirect()->route('vacancies.create');
    }

    /**
     * Show the page to display the details of the vacancy
     *
     * @param Vacancy $vacancy
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Vacancy $vacancy)
    {
        return view('vacancies.show', compact('vacancy'));
    }

    /**
     * Displays the update vacancy form.
     *
     * @param Vacancy $vacancy
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.edit', compact('vacancy'));
    }

    /**
     * Update the vacancy in the database if the request is validated.
     *
     * @param Vacancy $vacancy
     * @param VacancyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Vacancy $vacancy, VacancyRequest $request)
    {
        $vacancy->job_title = $request->job_title;
        $vacancy->location = $request->location;
        $vacancy->min_salary = $request->min_salary;
        $vacancy->max_salary = $request->max_salary;
        $vacancy->short_desc = $request->short_desc;
        $vacancy->long_desc = $request->long_desc;
        $vacancy->save();

        flash(__('general.update_vacancy_success'))->success();
        return redirect()->route('vacancies.edit', $vacancy);
    }

    /**
     * Delete the vacancy and redirects to the list of vacancies page.
     *
     * @param Vacancy $vacancy
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();

        flash(__('general.delete_vacancy_success'))->success();
        return redirect()->route('vacancies.index');
    }
}
