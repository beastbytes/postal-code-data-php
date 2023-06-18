<?php

use Robo\Symfony\ConsoleIO;
use Robo\Tasks;

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see https://robo.li/
 */
class RoboFile extends Tasks
{
    public function release($branch = 'master', $what = 'patch'): void
    {
        $this->say($what);
        $result = $this->taskSemVer()
            ->increment($what)
            ->run();

        $tag = $result->getMessage();

        $this->say("Releasing $tag");
        $this->clean();
        $this->createTag($branch, $tag);
    }

    public function clean(): void
    {
        $dirs = ['.phpunit.cache', 'logs'];
        $this->say('Cleaning up');
        $this->taskCleanDir($dirs)->run();
        $this->taskDeleteDir($dirs)->run();
    }

    /**
     * @desc creates a new version tag and pushes to Git
     * @param string $branch
     * @param string $tag
     */
    public function createTag(string $branch = '', string $tag = ''): void
    {
        $this->say("Creating tag $tag on origin::$branch");

        $this->taskGitStack()
            ->stopOnFail()
            ->add('.semver')
            ->commit('Update version')
            ->push('origin', $branch)
            ->tag($tag)
            ->push('origin', $tag)
            ->run();
    }
}
