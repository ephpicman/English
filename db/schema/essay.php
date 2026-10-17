<?php

/**
 * Essay schema
 *
 * Documents the fixed structure of one essay record. This file is a
 * schema/template, not a completed learner-facing entry.
 *
 * Data conventions:
 * - Preserve every key and nesting level defined below.
 * - Do not add, remove, or rename keys in individual records without revising
 *   the schema and dependent tooling deliberately.
 * - Use UTF-8 text, strings for single text values, and arrays of strings for
 *   lists of text.
 * - Keep the content accurate, natural, and appropriate to its intended genre
 *   and CEFR level.
 */

return [
    /**
     * ID
     * ---
     * Type: string
     * Required: yes
     *
     * The canonical identifier for this record. Use a stable descriptive identifier for the essay.
     * Keep identifiers unique within the relevant content collection and do
     * not use an incidental sentence from the body as the identifier.
     */
    'ID' => '[canonical identifier]',

    /**
     * type
     * ----
     * Type: string
     * Required: yes
     *
     * Identifies the record category. For this schema, the value must be
     * exactly "essay".
     */
    'type' => 'essay',

    /**
     * language_level
     * --------------
     * Type: string
     * Required: yes
     *
     * The overall CEFR level targeted by this record: A1, A2, B1, B2, C1, or C2.
     * Store one level, not a range. Assign it based on the language and
     * comprehension demands of the complete record.
     */
    'language_level' => 'B1',

    /**
     * title
     * -----
     * Type: string
     * Required: yes
     *
     * The essay's title, phrased as it should appear to the learner.
     */
    'title' => '',

    /**
     * content
     * -------
     * Type: array of strings
     * Required: yes
     *
     * The complete essay text splited into paragraphes.
     * Do not add task instructions, questions, or editorial notes.
     */
    'content' => '',

    /**
     * essay_type
     * ----------
     * Type: string
     * Required: yes
     *
     * The essay form. Use exactly one of these controlled values:
     * - opinion
     * - discussion
     * - advantages and disadvantages
     * - problem and solution
     * - cause and effect
     * - two-part question
     * - argumentative
     * - discursive
     * - descriptive
     * - narrative
     * - expository
     * - reflective
     *
     * Use one exact label as written; do not invent synonyms or combine
     * multiple categories. If a proposed essay does not fit any value,
     * review the taxonomy before adding it.
     */
    'essay_type' => '',

    /**
     * register
     * --------
     * Type: string
     * Required: yes
     *
     * The dominant register and degree of formality. For academic-style essays, record the
     * expected academic register rather than labelling it merely formal.
     */
    'register' => '',

    /**
     * educational_notes
     * -----------------
     * Type: array of strings
     * Required: yes
     *
     * Notes on organisation, cohesion, argumentation, paragraphing, or language choices that help the learner understand the model. Do not create exercises here.
     */
    'educational_notes' => [],

    /*
    |--------------------------------------------------------------------------
    | Editorial metadata maintained by a human editor
    |--------------------------------------------------------------------------
    |
    | The meta section contains organisational metadata and manually curated
    | relationships. Keep it separate from learner-facing content. Automated
    | processes must not silently overwrite editorial decisions.
    */
    'meta' => [
        /**
         * editorial_notes
         * ---------------
         * Type: array of strings
         *
         * Internal notes for the human editor, including sources to verify,
         * consistency issues, and decisions to revisit. These notes are not
         * learner-facing content. Remove temporary notes once they are resolved.
         */
        'editorial_notes' => [],

        /**
         * tags
         * ----
         * Type: array of strings
         *
         * Concise, consistent labels used to organise, filter, and retrieve the
         * entry. Avoid duplicate or near-duplicate tags that differ only in
         * spelling or capitalisation.
         */
        'tags' => [],

        /**
         * related
         * -------
         * Type: associative array with fixed relationship categories.
         * Each value is an array of strings containing canonical identifiers
         * or names, according to the repository's linking convention.
         *
         * Include only meaningful relationships selected or confirmed by a
         * human editor. Do not treat unreviewed automatic suggestions as
         * curated links. Do not add categories or duplicate relationships.
         */
        'related' => [
            /**
             * words
             * -----
             * Related single-word entries that have a meaningful lexical,
             * semantic, or usage relationship to this entry.
             */
            'words' => [],

            /**
             * grammars
             * --------
             * Grammar topics relevant to understanding or using this entry.
             */
            'grammars' => [],

            /**
             * idioms
             * ------
             * Idiom entries with a meaningful semantic, lexical, or usage
             * relationship to this entry.
             */
            'idioms' => [],

            /**
             * phrasal_verbs
             * -------------
             * Phrasal-verb entries with a meaningful semantic, lexical, or
             * usage relationship to this entry.
             */
            'phrasal_verbs' => [],

            /**
             * collocations
             * ------------
             * Collocation entries with a meaningful lexical, semantic, or
             * usage relationship to this entry.
             */
            'collocations' => [],
        ],
    ],
];
