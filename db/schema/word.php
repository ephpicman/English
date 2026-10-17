<?php

/**
 * Word-entry schema
 *
 * This file documents the expected structure of a single word entry.
 * It is a schema/template, not a completed vocabulary record.
 *
 * Data conventions:
 * - Keep every key and nesting level exactly as defined below.
 * - Do not add, remove, or rename keys in individual word records.
 * - Use UTF-8 text.
 * - Use strings for single text values and arrays of strings for lists of text.
 * - Use null for a word form that is not applicable or is intentionally unspecified.
 * - Keep definitions, examples, collocations, synonyms, and antonyms specific to
 *   the particular part of speech and meaning they describe.
 *
 * Suggested filename for an individual entry: the exact base form of the word,
 * following the repository's filename conventions.
 */

return [
    /**
     * ID
     * ---
     * Type: string
     * Required: yes
     *
     * The exact base form used to identify this word entry.
     * Use the dictionary headword form:
     * - verbs: base form (e.g. "write", not "wrote" or "written");
     * - nouns: singular form where the noun has a singular form;
     * - adjectives: base form (e.g. "small", not "smaller").
     *
     * This schema is for single-word entries. Idioms, phrasal verbs, and
     * collocations belong to their respective entry types, not this one.
     * Preserve the spelling and capitalisation appropriate to the headword.
     */
    'ID' => '[exact base form of the word]',

    /**
     * type
     * ----
     * Type: string
     * Required: yes
     *
     * Identifies the kind of entry represented by this record.
     * For this schema, the value must be exactly "word".
     */
    'type' => 'word',

    /**
     * language_level
     * --------------
     * Type: string
     * Required: yes
     *
     * The overall CEFR level assigned to the headword: A1, A2, B1, B2, C1, or C2.
     * Store one actual level, not a list of possible levels.
     *
     * This is the overall level for the entry. Individual meanings do not have
     * separate level fields in this schema.
     */
    'language_level' => 'B1',

    /**
     * pronunciation
     * -------------
     * Type: string
     * Required: yes
     *
     * A broad, standard contemporary British English IPA transcription of the
     * headword. Include primary stress where relevant and use IPA symbols rather
     * than respelling the word with ordinary English letters.
     *
     * Follow one consistent British pronunciation standard throughout the
     * vocabulary collection. Do not mix British and American transcriptions.
     * If a headword has materially different British pronunciations, document
     * the repository's chosen convention consistently rather than improvising
     * a new format for individual entries.
     */
    'pronunciation' => '',

    /**
     * word_forms
     * ----------
     * Type: associative array with the fixed keys below.
     * Values: string|null
     * Required: yes
     *
     * Record the relevant inflected or derived form for each grammatical slot.
     * Use the form itself as a string when it exists and is useful for this
     * headword; use null when the slot does not apply or no form is recorded.
     *
     * Do not remove keys just because they are irrelevant to a particular word.
     * This fixed structure makes entries consistent and easier to validate.
     *
     * plural:
     *   The plural form of a noun (e.g. "children"). Use null when not applicable.
     *
     * third_person_singular:
     *   The present simple third-person singular form of a verb (e.g. "goes").
     *   Use null when not applicable.
     *
     * past_simple:
     *   The past simple form of a verb (e.g. "went").
     *   Use null when not applicable.
     *
     * past_participle:
     *   The past participle form of a verb (e.g. "written").
     *   Use null when not applicable.
     *
     * present_participle:
     *   The -ing form of a verb (e.g. "writing").
     *   Use null when not applicable.
     *
     * comparative:
     *   The comparative form of an adjective or adverb where applicable
     *   (e.g. "smaller" or "more carefully"). Use null when not applicable.
     *
     * superlative:
     *   The superlative form of an adjective or adverb where applicable
     *   (e.g. "smallest" or "most carefully"). Use null when not applicable.
     *
     * These fields are for the listed forms only. Do not repurpose a field for
     * a different grammatical form.
     */
    'word_forms' => [
        'plural' => null,
        'third_person_singular' => null,
        'past_simple' => null,
        'past_participle' => null,
        'present_participle' => null,
        'comparative' => null,
        'superlative' => null,
    ],

    /**
     * parts_of_speech
     * ---------------
     * Type: list of part-of-speech records.
     * Required: yes
     *
     * Include one record for each part of speech in which the headword is used.
     * If a word is both a noun and a verb, for example, represent those uses as
     * separate records. Do not combine unrelated grammatical behaviour into a
     * single record.
     */
    'parts_of_speech' => [
        [
            /**
             * part_of_speech
             * --------------
             * Type: string
             * Required: yes
             *
             * The grammatical category represented by this record, using one
             * consistent naming convention throughout the collection
             * (e.g. "noun", "verb", "adjective", "adverb", "preposition",
             * "conjunction", "pronoun", "determiner", or "interjection").
             *
             * Choose the category that accurately describes the usage. Do not
             * use this field for grammar notes or proficiency levels.
             */
            'part_of_speech' => '',

            /**
             * grammar_tags
             * ------------
             * Type: array of strings
             * Required: yes
             *
             * A list of concise grammatical labels relevant to this part of
             * speech. Each label must be a separate array item, not several
             * labels combined into one pipe-separated string.
             *
             * Possible labels may include concepts such as "countable",
             * "uncountable", "plural", or "auxiliary". Use only labels that
             * are accurate for this part of speech and follow the project's
             * controlled vocabulary when one is defined.
             *
             * Do not put definitions, examples, CEFR levels, or editorial
             * comments here. An empty array is appropriate when no tag is needed.
             */
            'grammar_tags' => [],

            /**
             * meanings
             * --------
             * Type: list of meaning records.
             * Required: yes
             *
             * Separate meaningfully different senses of this part of speech
             * into individual records. Do not create duplicate records merely
             * to express small wording differences in the same definition.
             *
             * Order meanings consistently according to the project's editorial
             * convention; if no convention exists, use the most common or
             * pedagogically useful meaning first.
             */
            'meanings' => [
                [
                    /**
                     * definition
                     * ----------
                     * Type: string
                     * Required: yes
                     *
                     * A concise, accurate explanation of this particular
                     * meaning. Define the sense rather than repeating the
                     * headword or giving only a loose synonym.
                     *
                     * Keep the definition appropriate to the recorded part of
                     * speech and distinguish this sense from other senses in
                     * the same entry. Use clear English and avoid circular
                     * definitions.
                     */
                    'definition' => '',

                    /**
                     * general_examples
                     * ----------------
                     * Type: array of strings
                     * Required: yes
                     *
                     * Natural, useful examples showing this meaning in ordinary
                     * contexts. Each array item must contain one complete
                     * example as a single string.
                     *
                     * Examples must demonstrate the recorded sense and use
                     * natural grammar, collocation, and punctuation. Prefer
                     * contextual sentences over artificial examples designed
                     * only to repeat the headword. Do not place multiple
                     * independent examples in one array item.
                     */
                    'general_examples' => [
                        // Each example is a single string.
                    ],

                    /**
                     * professional_examples
                     * ----------------------
                     * Type: array of strings
                     * Required: yes
                     *
                     * Natural examples showing the same meaning in programming,
                     * information technology, software development, or computer
                     * science contexts.
                     *
                     * Each array item must contain one complete example as a
                     * single string. Use technically plausible situations and
                     * natural professional English. The headword must illustrate
                     * the same sense defined above; do not force a technical
                     * example when the meaning does not fit naturally.
                     *
                     * An empty array is acceptable when no accurate, natural
                     * professional example is available for this meaning.
                     */
                    'professional_examples' => [
                        // Programming, IT, software development, or computer science.
                    ],

                    /**
                     * collocations
                     * ------------
                     * Type: array of strings
                     * Required: yes
                     *
                     * Common or useful word combinations associated with this
                     * specific meaning, written as concise strings (e.g.
                     * "make a decision" or "strong evidence").
                     *
                     * Prefer established, natural combinations over arbitrary
                     * phrases. Include grammatical patterns here only when they
                     * are genuinely collocational expressions; do not use this
                     * list as a duplicate of the examples.
                     */
                    'collocations' => [],

                    /**
                     * synonyms
                     * ---------
                     * Type: array of strings
                     * Required: yes
                     *
                     * Words or expressions with a meaning sufficiently close
                     * to this particular sense to be useful as synonyms.
                     *
                     * Synonyms are not automatically interchangeable in every
                     * context. Do not list merely related words or near-synonyms
                     * that would mislead the learner. Where register or nuance
                     * makes a proposed synonym unsuitable as a general
                     * replacement, explain the distinction in educational_notes
                     * rather than implying exact equivalence.
                     */
                    'synonyms' => [],

                    /**
                     * antonyms
                     * --------
                     * Type: array of strings
                     * Required: yes
                     *
                     * Words with an opposing meaning to this particular sense.
                     * Include an antonym only when the opposition is meaningful
                     * and useful. Not every word or sense has a genuine antonym;
                     * an empty array is preferable to an inaccurate one.
                     */
                    'antonyms' => [],

                    /**
                     * educational_notes
                     * -----------------
                     * Type: array of strings
                     * Required: yes
                     *
                     * Short learner-focused notes about this particular meaning.
                     * Use these for distinctions that help learners understand
                     * or use the sense accurately, such as register, nuance,
                     * common learner errors, restrictions, or differences from
                     * a similar word.
                     *
                     * Each item should be a separate, self-contained string.
                     * Do not repeat the definition without adding useful
                     * information, and do not place editorial workflow notes here.
                     */
                    'educational_notes' => [],
                ],
            ],

            /**
             * educational_notes (part-of-speech level)
             * ----------------------------------------
             * Type: array of strings
             * Required: yes
             *
             * Notes that apply to this part of speech as a whole rather than to
             * one specific meaning. Examples include general grammatical
             * behaviour, usage restrictions, or a distinction applying across
             * several senses of this part of speech.
             *
             * Put sense-specific guidance in meanings[*].educational_notes.
             */
            'educational_notes' => [],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Exclusively maintained by a human editor
    |--------------------------------------------------------------------------
    |
    | The meta section contains editorial organisation and manually curated
    | relationships. It is not part of the linguistic definition of a meaning.
    | Automated processing must not silently overwrite human editorial choices.
    */

    /**
     * meta
     * ----
     * Type: associative array.
     * Required: yes
     *
     * Human-maintained metadata used to organise and connect entries.
     */
    'meta' => [
        /**
         * editorial_notes
         * ---------------
         * Type: array of strings
         *
         * Internal editorial observations about this record: decisions to
         * revisit, sources to check, consistency concerns, or other notes for
         * the human editor. These are not learner-facing educational notes.
         *
         * Remove resolved temporary notes when they are no longer needed.
         */
        'editorial_notes' => [],

        /**
         * tags
         * ----
         * Type: array of strings
         *
         * Human-assigned labels used to organise, filter, or retrieve this entry.
         * Use concise, consistent tags and avoid creating near-duplicates with
         * different spelling or capitalisation. These are editorial metadata,
         * not grammatical tags; grammatical labels belong in grammar_tags.
         */
        'tags' => [],

        /**
         * related
         * -------
         * Type: associative array containing the fixed relationship categories
         * below. Each value is an array of strings.
         *
         * Record relationships selected or confirmed by a human editor.
         * Do not treat automatically inferred associations as human-reviewed
         * relationships unless an editor has checked them.
         *
         * Store the canonical identifiers or names used by the corresponding
         * entry collection, following the repository's linking convention.
         * Avoid duplicates and do not add categories beyond the defined keys.
         */
        'related' => [
            /**
             * words
             * -----
             * Related single-word entries. Add only meaningful learning or
             * lexical relationships, not every word that happens to occur in
             * the same example.
             */
            'words' => [],

            /**
             * grammars
             * --------
             * Related grammar topics or grammar records that help explain the
             * use of this word.
             */
            'grammars' => [],

            /**
             * idioms
             * ------
             * Related idiom entries in which this word plays a meaningful role.
             */
            'idioms' => [],

            /**
             * phrasal_verbs
             * -------------
             * Related phrasal-verb entries. Use the canonical identifier or
             * name expected by the phrasal-verb collection.
             */
            'phrasal_verbs' => [],

            /**
             * collocations
             * ------------
             * Related collocation entries maintained in the corresponding
             * collection. This is for cross-entry links; collocations belonging
             * directly to a meaning remain in meanings[*].collocations.
             */
            'collocations' => [],

            /**
             * questions
             * ---------
             * Related questions, review prompts, or question records maintained
             * by the project. Link only to relevant, identifiable records.
             */
            'questions' => [],
        ],
    ],
];
