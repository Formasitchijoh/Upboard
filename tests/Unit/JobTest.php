<?php
use App\Models\Job;
use App\Models\Employer;

test('It belongs to an employer', function () {
    
    // Arrange
    $employer = Employer::factory()->create();
    $job = Job::factory()->create([
        'employer_id' => $employer->id,
    ]);
    
    // Act && Assert
    expect($job->employer->is($employer))->toBeTrue();
});

it('Can Have Tags', function(){
    $job = Job::factory()->create();
    $job->tag('Frontend');
    expect($job->tags)->toHaveCount(1);
});
