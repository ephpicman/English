<?php

/**
 * Essay schema
 *
 * Purpose
 * This schema defines one complete essay record, including its title, essay type, register, and educational metadata. Store the essay as an ordered list of paragraphs. Keep the chosen essay type and register consistent with the essay's actual purpose and style.
 *
 * Shared conventions
 * - This file defines the required structure and field-level guidance for one
 *   record of its specific content type; it is a schema/template, not a completed entry.
 * - Treat the keys, nesting, and data types defined below as authoritative.
 *   Do not add, remove, rename, or repurpose fields in individual records
 *   without deliberately revising the schema and dependent tooling.
 * - Use UTF-8 text, British English, and accurate, natural language suitable
 *   for the record's purpose, intended audience, and stated CEFR level.
 * - Use strings for single text values and arrays of strings for ordered lists
 *   of text, as specified by each field. Preserve sequence wherever order matters.
 * - Follow each field's documented requirements and controlled values. Keep
 *   editorial metadata separate from learner-facing content.
 * - Replace illustrative placeholders with actual data in completed entries.
 *   Do not treat sample values in this schema as finished content.
 *
 * This file is part of the ephpicman/English project. It is licensed under the Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License (CC BY-NC-ND 4.0). See the LICENSE file for full details.
 */

return [
    /**
     * ID
     * ---
     * Type: string
     * Required: yes
     *
     * A stable, descriptive identifier for the essay. Do not use an incidental sentence from its body.
     * Keep identifiers unique within the relevant content collection.
     */
    'ID' => '[canonical identifier]',

    /**
     * type
     * ----
     * Type: string
     * Required: yes
     *
     * Identifies the category of record. The value must be exactly
     * "essay", matching this schema's entry type.
     */
    'type' => 'essay',

    /**
     * language_level
     * --------------
     * Type: string
     * Required: yes
     *
     * The overall CEFR level targeted by this record: A1, A2, B1, B2, C1, or C2.
     * Store exactly one level, not a range or a list. Assign it according to
     * the language and comprehension demands of the complete record.
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
     * The complete essay, stored as an ordered array of paragraph strings. Each
     * array item must contain exactly one paragraph, with its original wording
     * and internal sentence order preserved. Do not combine separate paragraphs
     * into one item or split a paragraph across multiple items. Do not include
     * task instructions, questions, headings that are not part of the essay,
     * or editorial notes.
     */
    'content' => [],

    /**
     * essay_type
     * ----------
     * Type: string
     * Required: yes
     *
     * The essay's dominant form or rhetorical purpose. Prefer one of these
     * established labels, choosing the closest fit to the essay as a whole:
     * - argumentative: advances and supports a clear position or claim
     * - discussion: examines multiple sides of an issue before reaching a
     *   conclusion or presenting a balanced judgement
     * - advantages and disadvantages: weighs benefits against drawbacks
     * - problem and solution: explains a problem and proposes or assesses
     *   possible solutions
     * - cause and effect: explains causes, consequences, or both
     * - compare and contrast: analyses relevant similarities and differences
     * - descriptive: presents a detailed description of a person, place,
     *   object, experience, or scene
     * - narrative: recounts events in a meaningful sequence
     * - expository: explains or clarifies a subject using information and
     *   supporting explanation
     * - process: explains how something works or how something is done
     * - analytical: examines parts, patterns, evidence, or relationships to
     *   explain how or why something works or means what it does
     * - evaluative: assesses the value, quality, effectiveness, or significance
     *   of something against relevant criteria
     * - reflective: explores an experience and the insights or learning drawn
     *   from it
     *
     * These labels are intended to cover common, meaningfully distinct essay
     * forms, but some overlap is inevitable. Choose one dominant label rather
     * than combining categories. Prefer these established labels wherever
     * reasonably applicable; do not invent a new label merely because an essay
     * combines features of more than one form. If none is a reasonable fit,
     * flag the taxonomy for review rather than silently adding a value.
     */
    'essay_type' => '',

    /**
     * register
     * --------
     * Type: string
     * Required: yes
     *
     * The dominant register and degree of formality. Common values include:
     * - formal academic
     * - formal
     * - semi-formal
     * - neutral
     * - informal/personal
     *
     * Choose the most accurate concise label for the essay as a whole. For an
     * academic essay, prefer "formal academic" to the less specific "formal".
     * Use a consistent label and note any meaningful shifts of register in
     * educational_notes.
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
