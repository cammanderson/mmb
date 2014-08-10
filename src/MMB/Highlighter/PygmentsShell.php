<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Highlighter;

use Symfony\Component\Process\ProcessBuilder;

class PygmentsShell implements HighlighterInterface {

    protected $bin;
    protected $defaultOpts = array(
        'full' => 'false',
        'linenos' => 'table'
    );

    function __construct($bin = '/usr/bin/pygmentize')
    {
        $this->bin = $bin;
    }

    public function highlight($block, $language)
    {
        // Build the options
        $builder = new ProcessBuilder();

        // Input the block to the bin
        $builder->setPrefix("$this->bin");
        $builder->setInput($block);

        // Set the language and desired output
        $builder->add("-l$language")
            ->add("-fhtml");

        // Set some other options
        foreach ($this->defaultOpts as $argument => $value)
            $builder->add("-P$argument=$value");

        // Run the process
        $process = $builder->getProcess();
        $process->run();

        // Check the output
        if (!$process->isSuccessful()) {
            throw new \RuntimeException($process->getErrorOutput());
        }

        // Return the result
        return $process->getOutput();
    }
}
 