<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyFilterRequest;
use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Builder;

class VacancyController extends Controller
{
    /**
     * Returns vacancies, filtered by filter parameters if they are in the request.
     * The result is paginated to list 2 vacancies per page.
     * The sort order is default to show the latest vacancy first.
     *
     * @param VacancyFilterRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function index(VacancyFilterRequest $request)
    {
        // Get filter parameters
        $filters = $request->getFilterParams();

        // Filter vacancies
        $vacancies = Vacancy::when($request->job_title, function (Builder $query, string $jobTitle) {
            $query->filterJobTitle($jobTitle);
        })
            ->when($request->location, function (Builder $query, string $location) {
                $query->filterLocation($location);
            })
            ->when($request->salary, function (Builder $query, int $salary) {
                $query->filterSalary($salary);
            })
            // Keep the task simple by descending order of created_at and 2 results per page
            ->orderByDesc('created_at')
            ->paginate(2);

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
        Vacancy::create($request->validated());

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
        $vacancy->update($request->validated());

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
